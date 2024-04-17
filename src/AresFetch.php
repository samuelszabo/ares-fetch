<?php

namespace AresFetch;

use AresFetch\Response\InvalidResponse;
use AresFetch\Response\NoResultsResponse;
use AresFetch\Response\OneCompanyResult;
use AresFetch\Response\ResultInterface;
use Psr\Http\Client\ClientInterface;

class AresFetch
{
    private ClientInterface $client;
    /** @var array<mixed> */
    private array $config;

    public function __construct(array $config = [])
    {
        $this->config = $config;
        $this->initConfig();
    }

    private function initConfig(): void
    {
        if (isset($this->config['client'])) {
            if (!$this->config['client'] instanceof ClientInterface) {
                throw new \RuntimeException('Invalid client provided');
            }
            $this->client = $this->config['client'];
        } elseif (class_exists('\GuzzleHttp\Client')) {
            $this->client = new \GuzzleHttp\Client();
        } else {
            throw new \RuntimeException('No client provided');
        }
    }

    public function request(Request\Request $request): ResultInterface
    {
        $response = $this->client->sendRequest($request);

        $data = $this->parseData($response);

        if ($response->getStatusCode() === 404) {
            return new NoResultsResponse($data);
        }

        if ($response->getStatusCode() !== 200 || $data === []) {
            return new InvalidResponse($data);
        }

        $responseClass = $request->getResponseClass();
        /** @var ResultInterface $result */
        $result = new $responseClass();
        $result->setResults($data);
        return $result;
    }

    private function parseData(\Psr\Http\Message\ResponseInterface $response): array
    {
        $return = json_decode($response->getBody()->getContents(), true);
        if (is_array($return)) {
            return $return;
        }
        // todo log incorrect response
        return [];
    }

    public function searchByCompanyId(string $string): ?OneCompanyResult
    {
        $search = new Request\SearchByCompanyId($string);
        /** @var OneCompanyResult $result */
        $result = $this->request($search);
        if ($result->isSuccess()) {
            return $result;
        }

        return null;
    }
}
