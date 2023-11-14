<?php
namespace App\Test\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class HomeControllerTest extends WebTestCase
{
    public function testHomePage(){
        $client = static::createClient();
        $client->request(method: 'GET', uri: '/catalogue');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }
}
