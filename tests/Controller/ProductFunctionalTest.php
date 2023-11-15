<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductFunctionalTest extends WebTestCase
{
    public function testShoulDisplayApropos(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/products/');

        $this->assertResponseIsSuccessful();
    }
}
