<?php

namespace AresFetch\Request;

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

    public function getResponseClass(): string
    {
        return 'AresFetch\Response\OneCompanyResult';
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
