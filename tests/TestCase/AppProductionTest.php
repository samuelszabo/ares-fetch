<?php

namespace TestCase;

use PHPUnit\Framework\TestCase;

/**
 * This test access production env, so should be not run in CI
 * Needs Guzzle to be installed
 */
class AppProductionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        if (getenv('CI') === 'true') {
            $this->markTestSkipped('This test should not be run in CI');
        }
    }

    /**
     * @param string $id
     * @return void
     * @dataProvider provideCorrectValues
     */
    public function testProductionCorrectValues(string $id): void
    {
        $aresFetch = new \AresFetch\AresFetch();
        $result = $aresFetch->searchByCompanyId($id);
        $this->assertTrue($result->isSuccess());
        $company = $result->getCompany();
        $this->assertNotNull($company);
    }

    public function provideCorrectValues(): array
    {
        return [
            ['01569651'],
            ['27082440'],
            ['25123891'],
            ['17139015'],
        ];
    }
}
