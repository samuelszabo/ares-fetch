<?php

namespace AresFetch\Response;

use AresFetch\Entity\EntityBuilder;

class OneCompanyResult extends Result
{
    private ?\AresFetch\Entity\Company $company;

    public function isSuccess(): bool
    {
        return true;
    }

    public function setResults(array $results): void
    {
        $builder = new EntityBuilder();
        $company = $builder->company($results);
        $this->company = $company;
    }

    public function getCompany(): ?\AresFetch\Entity\Company
    {
        return $this->company;
    }
}
