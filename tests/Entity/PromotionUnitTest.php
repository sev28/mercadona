<?php

namespace App\Tests;

use App\Entity\Products;
use App\Entity\Promotion;
use DateTime;
use PHPUnit\Framework\TestCase;

class PromotionUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $promotion = new Promotion();
        $product = new Products();
        $datetime = new DateTime();

        $promotion->setPourcent(10)
                  ->setBeginDate($datetime)
                  ->setEndDate($datetime)
                  ->addProduct($product);

        $this->assertTrue( $promotion->getPourcent() === 10);
        $this->assertTrue( $promotion->getBeginDate() === $datetime);
        $this->assertTrue( $promotion->getEndDate() === $datetime);
        $this->assertContains($product, $promotion->getProducts());
    }
       
    public function testIsFalse()
    {
        $promotion = new Promotion();
        $product = new Products();
        $datetime = new DateTime();


        $promotion->setPourcent(10);
        $promotion->setBeginDate($datetime);
        $promotion->setEndDate($datetime);
        $promotion->addProduct($product);

        $this->assertFalse($promotion->getPourcent() == 12);
        $this->assertFalse($promotion->getBeginDate() === new DateTime());
        $this->assertFalse($promotion->getEndDate() === new DateTime());
        $this->assertNotContains(new Products(), $promotion->getProducts());
    }
    public function testIsEmpty()
    {
        $promotion = new promotion(); 

        $this->assertEmpty($promotion->getPourcent());
        $this->assertEmpty($promotion->getBeginDate());
        $this->assertEmpty($promotion->getEndDate());
        $this->assertEmpty($promotion->getProducts());
        $this->assertEmpty($promotion->getId());
        
    }
    public function testAddRemoveProduct(){
        $promotion = new Promotion();
        $product = new Products();

        $this->assertEmpty($promotion->getProducts());

        $promotion->addProduct($product);
        $this->assertContains($product, $promotion->getProducts());

        $promotion->removeProduct($product);
        $this->assertEmpty($promotion->getProducts());

    }
}   

