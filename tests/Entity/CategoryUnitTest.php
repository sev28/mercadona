<?php

namespace App\Tests;

use App\Entity\Category;
use App\Entity\Products;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $category = new Category();
        $product= new Products();

        $category->setWording('Test Wording');
        $category->addProduct($product);

        $this->assertTrue( $category->getWording() === 'Test Wording');
        $this->assertContains($product, $category->getProducts());
    }
    
    public function testIsFalse()
    {
        $category = new Category();
        $product= new Products();

        $category->setWording('Test Wording')
                 ->addProduct($product);


        $this->assertFalse( $category->getWording() === 'Wording');
        $this->assertNotContains(new Products, $category->getProducts());
    }

    public function testIsEmpty()
    {
        $category = new Category(); 

        $this->assertEmpty($category->getWording());
        $this->assertEmpty($category->getProducts());
    }
}
