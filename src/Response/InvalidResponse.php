<?php

namespace AresFetch\Response;

class InvalidResponse implements ResultInterface
{
    private string $message;
    private string $code;
    private string $subCode;

    public function __construct(array $data)
    {
        $this->code = isset($data['kod']) && is_string($data['kod']) ? $data['kod'] : 'Invalid response';
        $this->subCode = isset($data['subKod']) && is_string($data['subKod']) ? $data['subKod'] : 'Invalid response';
        $this->message = isset($data['popis']) && is_string($data['popis']) ? $data['popis'] : 'Invalid response';
    }

    public function isSuccess(): bool
    {
        return false;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getSubCode(): string
    {
        return $this->subCode;
    }

    public function getResults(): array
    {
        return [];
    }

    public function setResults(array $results): void
    {
    }
}
