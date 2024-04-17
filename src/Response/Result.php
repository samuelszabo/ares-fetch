<?php

namespace AresFetch\Response;

abstract class Result implements ResultInterface
{
    private array $results;

    public function setResults(array $results): void
    {
        $this->results = $results;
    }

    public function getResults(): array
    {
        return $this->results;
    }
}
