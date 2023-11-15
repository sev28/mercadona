<?php

namespace App\tests\Controller;

use App\Entity\Admin;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategoryCrudControllerTest extends WebTestCase
{
    public function testIfCreateCategoryIsSuccessfull(): void
    {
        $client = static::createClient();
       // Recuperer url générator
       $urlGenerator = $client->getContainer()->get('router');

       // Recup entity manager
       $entityManager = $client->getContainer()->get('doctrine:orm.entity_manager');

       $user = $entityManager->find(Admin::class, 1);
       // Se rendre sur la page de création d'une catégorie
       // gérer le formulaire
       // Gérer la redirection
       // la route 
    }
}
