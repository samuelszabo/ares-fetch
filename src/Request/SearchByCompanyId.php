<?php

namespace AresFetch\Request;

use AresFetch\Response\OneCompanyResult;
use AresFetch\Response\ResultInterface;

class SearchByCompanyId extends Request
{
    private const string URI = 'https://ares.gov.cz/ekonomicke-subjekty-v-be/rest/ekonomicke-subjekty/';

    public function __construct(private readonly string $companyId)
    {
        $uri = $this->uriForCompanyId($companyId);
        parent::__construct(
            'GET',
            $uri
        );
    }

    public function getResponseClass(): ResultInterface
    {
        return new OneCompanyResult();
    }

    public function getCompanyId(): string
    {
        return $this->companyId;
    }

    private function uriForCompanyId(string $companyId): string
    {
        return self::URI . $companyId;
    }
}
