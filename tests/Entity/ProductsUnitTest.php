<?php
namespace App\Tests\Entity;

use App\Entity\Category;
use App\Entity\Products;
use App\Entity\Promotion;
use PHPUnit\Framework\TestCase;

class ProductsUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $products = new Products();
        $category = new Category();
        $promotion = new Promotion();

        $products->setDescription('Test Description');
        $products->setTitle('Test Title');
        $products->setImage('Test Image');
        $products->setCategory($category);
        $products->setPromotion($promotion);
        $products->setPrice(10.5);

        $this->assertTrue( $products->getDescription() === 'Test Description');
        $this->assertTrue( $products->getTitle() === 'Test Title');
        $this->assertTrue( $products->getImage() === 'Test Image');
        $this->assertTrue($products->getCategory() === $category);
        $this->assertTrue($products->getPromotion() === $promotion);
        $this->assertTrue($products->getPrice() === 10.5);
    }
       
    public function testIsFalse()
    {
        $products = new Products();
        $category = new Category();
        $promotion = new Promotion();

        $products->setDescription('Test Description');
        $products->setTitle('Test Title');
        $products->setCategory($category);
        $products->setPromotion($promotion);
        $products->setPrice(10.5);

        $this->assertFalse($products->getDescription() === 'false');
        $this->assertFalse($products->getTitle() === 'false');
        $this->assertFalse($products->getImage() === 'false');
        $this->assertFalse($products->getCategory() === new Category());
        $this->assertFalse($products->getPromotion() === new Promotion());
        $this->assertFalse($products->getPrice() == 12.6);
    }
    public function testIsEmpty()
    {
        $products = new Products(); 

        $this->assertEmpty($products->getDescription());
        $this->assertEmpty($products->getTitle());
        $this->assertEmpty($products->getImage());
        $this->assertEmpty($products->getCategory());
        $this->assertEmpty($products->getPromotion());
        $this->assertEmpty($products->getPrice());
        $this->assertEmpty($products->getId());

    }
}   