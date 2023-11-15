<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Category;
use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(PasswordAuthenticatedUserInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // utilisation de Faker 
        $faker = Factory::create('fr_FR');
        
        //création d'un utilisateur
        $admin = new Admin();

        $admin->setEmail('test@admin.com')
              ->setRoles(['ROLE_PEINTRE']);

        $password = $this->encoder->encodePassword($admin, 'password');
        $admin->setPassword($password);

        $manager->persist($admin);

        //creation de 10 produits 
        for ($i=0; $i < 10; $i++){
            $product = new Products();

            $product->setTitle($faker->words(3, true))
                    ->setDescription($faker->text(350))
                    ->setPrice($faker->text(3));

            $manager->persist($product);
        }

        // créetion de 5 categories
        for ($k=0; $k < 5; $k++) {
            $category = new Category();

            $category->setWording($faker->word());

            $manager->persist($category);
        }

        //création d'un produit pour les tests
    
;



    }


     

    

}
