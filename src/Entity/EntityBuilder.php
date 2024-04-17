<?php

namespace AresFetch\Entity;

class EntityBuilder
{
    public function company(array $data): Company
    {
        $company = new Company();
        $company->setId($data['ico']);
        $company->setName($data['obchodniJmeno']);
        $address = $this->address($data['sidlo']);
        $company->setAddress($address);
        $company->setLegalForm($data['pravniForma']);
        $company->setTaxNumber($data['dic'] ?? '');
        $company->setEstablished($this->dateTime($data['datumVzniku']));
        $company->setUpdated($this->dateTime($data['datumAktualizace']));
        $company->setNace($this->nace($data['czNace']));

        return $company;
    }

    private function address(array $data): Address
    {
        $address = new Address();
        $address->setCity($data['nazevObce']);
        $address->setStreet($data['nazevUlice']);
        $address->setHouseNumber($data['cisloDomovni']);
        $address->setZipCode($data['psc']);
        $address->setCountry($data['kodStatu']);
        $address->setRegion($data['nazevKraje']);
        $address->setDistrict($data['nazevOkresu'] ?? '');
        $address->setCityPart($data['nazevCastiObce'] ?? '');
        $address->setInlineAddress($data['textovaAdresa'] ?? '');

        return $address;
    }

    private function nace(array $data): Nace
    {
        return new Nace($data);
    }

    private function dateTime(string $datumVzniku): \DateTimeInterface
    {
        return new \DateTimeImmutable($datumVzniku);
    }
}
