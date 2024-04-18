<?php

namespace AresFetch\Request;

use AresFetch\Response\ResultInterface;

abstract class Request extends \GuzzleHttp\Psr7\Request
{
    abstract public function getResponseClass(): ResultInterface;
}
