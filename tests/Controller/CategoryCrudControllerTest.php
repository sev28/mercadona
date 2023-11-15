<?php

namespace App\tests\Controller;

use App\Entity\Admin;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryCrudControllerTest extends WebTestCase
{
    public function testIfCreateCategoryIsSuccessfull(): void
    {
        $client = static::createClient();
       // Recuperer url générator
       $urlGenerator = $client->getContainer()->get('router');

       // Recup entity manager
       $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');

       $admin = $entityManager->find(Admin::class, 2);
       $client->loginUser($admin);

       // Se rendre sur la page de création d'une catégorie
       $crawler = $client->request(Request::METHOD_GET, $urlGenerator->generate('category.new'));
       
       // gérer le formulaire
       $form = $crawler->filter('form[name=caterory]')->form([
            'category[wording]' => 'Un libéllé',
       ]);

       $client->submit($form);

       // Gérer la redirection
       $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);

       $client->followRedirect();
       // la route 
       $this->assertRouteSame('category.index');
    }
}
