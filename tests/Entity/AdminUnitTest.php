<?php
namespace App\Tests\Entity;

use App\Entity\Admin;
use PHPUnit\Framework\TestCase;

class AdminUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $admin = new Admin();
        

        $admin->setEmail('test@test.com');
        $admin->setPassword('Password');
        $admin->setRoles(['ROLE_TEST']);
        
       

        $this->assertTrue( $admin->getEmail() === 'test@test.com');
        $this->assertTrue( $admin->getPassword() === 'Password');
        $this->assertTrue( $admin->getRoles() === ['ROLE_TEST', 'ROLE_USER']);
 
    }
       
    public function testIsFalse()
    {
        $admin = new Admin();
        

        $admin->setEmail('test@test.com');
        $admin->setPassword('Password');
       

        $this->assertFalse($admin->getEmail() === 'false@test.com');
        $this->assertFalse($admin->getPassword() === 'false');
     
    }
    public function testIsEmpty()
    {
        $admin = new Admin(); 

        $this->assertEmpty($admin->getEmail());
        $this->assertEmpty($admin->getId());
        

    }
}