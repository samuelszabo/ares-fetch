<?php

namespace AresFetch\Request;

abstract class Request extends \GuzzleHttp\Psr7\Request
{
    abstract public function getResponseClass(): string;
}
