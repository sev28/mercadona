<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class SecurityFunctionalTest extends WebTestCase
{
    public function testLogin(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        $this->assertResponseIsSuccessful();
    }
    public function testLogout()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/logout');

        $this->assertResponseRedirects();
    }
}
