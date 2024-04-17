<?php

namespace AresFetch\Entity;

class Address
{
    private string $city;
    private string $street;
    private string $houseNumber;
    private string $zipCode;
    private string $country;
    private string $region;
    private string $district;
    private string $cityPart;

    private string $inlineAddress;

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }

    public function setHouseNumber(string $houseNumber): void
    {
        $this->houseNumber = $houseNumber;
    }

    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): void
    {
        $this->zipCode = $zipCode;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    public function getDistrict(): string
    {
        return $this->district;
    }

    public function setDistrict(string $district): void
    {
        $this->district = $district;
    }

    public function getCityPart(): string
    {
        return $this->cityPart;
    }

    public function setCityPart(string $cityPart): void
    {
        $this->cityPart = $cityPart;
    }

    public function getInlineAddress(): string
    {
        return $this->inlineAddress;
    }

    public function setInlineAddress(string $inlineAddress): void
    {
        $this->inlineAddress = $inlineAddress;
    }
}
