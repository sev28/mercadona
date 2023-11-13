<?php
namespace App\Tests\Entity;

use App\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    public function testGetWording()
    {
        $category = new Category();

        $category->setWording("Test Wording");

        $this->assertEquals("Test Wording", $category->getWording());
    }
}