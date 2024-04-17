<?php

namespace AresFetch\Entity;

class Company
{
    private string $id;
    private string $name;
    private Address $address;
    private string $taxNumber;
    private string $legalForm;
    private \DateTimeInterface $established;
    private \DateTimeInterface $updated;
    private Nace $nace;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }

    public function getTaxNumber(): string
    {
        return $this->taxNumber;
    }

    public function setTaxNumber(string $taxNumber): void
    {
        $this->taxNumber = $taxNumber;
    }

    public function getLegalForm(): string
    {
        return $this->legalForm;
    }

    public function setLegalForm(string $legalForm): void
    {
        $this->legalForm = $legalForm;
    }

    public function getEstablished(): \DateTimeInterface
    {
        return $this->established;
    }

    public function setEstablished(\DateTimeInterface $dateTime): void
    {
        $this->established = $dateTime;
    }

    public function getUpdated(): \DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(\DateTimeInterface $dateTime): void
    {
        $this->updated = $dateTime;
    }

    public function getNace(): Nace
    {
        return $this->nace;
    }
    public function setNace(Nace $nace): void
    {
        $this->nace = $nace;
    }
}
