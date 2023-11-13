<?php
namespace App\Tests\Entity;

use App\Entity\Products;
use PHPUnit\Framework\TestCase;

class ProductsTest extends TestCase
{
    public function testGetDescription()
    {
        $products = new Products();

        $products->setDescription("Test Description");

        $this->assertEquals("Test Description", $products->getDescription());
    }
    public function testGetTitle()
    {
        $products = new Products();

        $products->setTitle("Test Title");

        $this->assertEquals("Test Title", $products->getTitle());
    }
}