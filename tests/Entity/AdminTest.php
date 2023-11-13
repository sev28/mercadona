<?php
namespace App\Tests\Entity;

use App\Entity\Admin;
use PHPUnit\Framework\TestCase;

class AdminTest extends TestCase
{
    public function testGetEmail()
    {
        $admin = new Admin();

        $admin->setEmail("Test Email");

        $this->assertEquals("Test Email", $admin->getEmail());
    }
    public function testGetPassword()
    {
        $admin = new Admin();

        $admin->setPassword("Test Password");

        $this->assertEquals("Test Password", $admin->GetPassword());
    }
}