<?php

namespace AresFetch\Request;

interface RequestInterface
{
    public function getEndpoint(): string;

    public function getMethod(): string;

    public function getQueryParams(): array;

    public function getBody(): string;
}
