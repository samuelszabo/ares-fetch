<?php

namespace TestCase;

use AresFetch\Response\OneCompanyResult;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class AppSearchByCompanyIdTest extends TestCase
{
    public function testWrongInputShouldReturnInvalidResponse(): void
    {
        $jsonError = json_encode([
            'kod' => 'CHYBA_VSTUPU',
            'popis' => 'Položka \'ico\' : nesplňuje regulární výraz [0-9]{8}|Není vyplněn správný formát IČO. Upravte parametry vyhledávání.|Chyba vstupu',
            'subKod' => 'VSTUP_NEVALIDNI_FORMAT_ICO'
        ]);
        $guzzleMock = \Mockery::mock(Client::class);
        $guzzleMock
            ->shouldReceive('sendRequest')
            ->andReturn(new Response(400, [], $jsonError));

        $aresFetch = new \AresFetch\AresFetch([
            'client' => $guzzleMock,
        ]);

        $search = new \AresFetch\Request\SearchByCompanyId('ABC');
        $result = $aresFetch->request($search);

        //assert
        $this->assertInstanceOf(\AresFetch\Response\InvalidResponse::class, $result);
        $this->assertFalse($result->isSuccess());
    }

    public function testSearchByCorrectCompanyId()
    {
        $aresFetch = new \AresFetch\AresFetch([
            'client' => $this->mockFound(),
        ]);

        $this->assertInstanceOf(\AresFetch\AresFetch::class, $aresFetch);

        $search = new \AresFetch\Request\SearchByCompanyId('01569651');
        $result = $aresFetch->request($search);

        $this->assertInstanceOf(\AresFetch\Response\ResultInterface::class, $result);
        $this->assertInstanceOf(\AresFetch\Response\OneCompanyResult::class, $result);
        $this->assertTrue($result->isSuccess());

        $company = $result->getCompany();

        $this->assertInstanceOf(\AresFetch\Entity\Company::class, $company);
        $this->assertSame('01569651', $company->getId());
        $this->assertSame('CZ01569651', $company->getTaxNumber());
        $this->assertSame('Superfaktura.cz, s.r.o.', $company->getName());

        $address = $company->getAddress();
        $this->assertInstanceOf(\AresFetch\Entity\Address::class, $address);
    }


    public function testSearchByCorrectCompanyIdShortForm()
    {
        $aresFetch = new \AresFetch\AresFetch([
            'client' => $this->mockFound(),
        ]);

        $this->assertInstanceOf(\AresFetch\AresFetch::class, $aresFetch);
        $result = $aresFetch->searchByCompanyId('01569651');

        $this->assertInstanceOf(\AresFetch\Response\OneCompanyResult::class, $result);
        $this->assertTrue($result->isSuccess());

        $company = $result->getCompany();

        $this->assertSame('01569651', $company->getId());
    }

    private function mockFound(): Client
    {
        $data = file_get_contents(dirname(__DIR__) . '/data/responses/found_superfaktura.json');
        $guzzleMock = \Mockery::mock(Client::class);
        $guzzleMock
            ->shouldReceive('sendRequest')
            ->andReturn(new Response(200, [], $data));

        return $guzzleMock;
    }
}
