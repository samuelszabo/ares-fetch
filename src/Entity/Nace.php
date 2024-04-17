<?php

namespace AresFetch\Entity;

class Nace
{
    /**
     * @var string[]
     */
    private array $codes;

    public function __construct(array $codes)
    {
        foreach ($codes as $code) {
            //todo probably some validation
            $this->addCode($code);
        }
    }

    private function addCode(string $code): void
    {
        $this->codes[] = $code;
    }

    /**
     * @return string[]
     */
    public function getCodes(): array
    {
        return $this->codes;
    }
}
