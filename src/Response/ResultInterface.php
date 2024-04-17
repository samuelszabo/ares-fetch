<?php

namespace AresFetch\Response;

interface ResultInterface
{
    public function isSuccess(): bool;

    public function getResults(): array;

    public function setResults(array $results): void;
}
