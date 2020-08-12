<?php

namespace App\Tests\Entity;

use App\Entity\Task;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase
{
    private $user;
    private $task;
    private $createdAt;

    public function setUp(): void
    {
        $this->user = new User();
        $this->task = new Task();
        $this->createdAt = new \DateTime();
    }

    public function testId()
    {
        self::assertEquals(null, $this->user->getId());
    }

    public function testUsername()
    {
        $this->user->setUsername('danieluser');
        self::assertEquals('danieluser', $this->user->getUsername());
    }

    public function testPassword()
    {
        $this->user->setPassword('Xkeyscore');
        self::assertEquals('Xkeyscore', $this->user->getPassword());
    }


    public function testGetSalt()
    {
        self::assertEquals(null, $this->user->getSalt());
    }

    public function testUserGetId()
    {
        self::assertEquals(null, $this->user->getId());
    }

    public function testUser()
    {
        $this->user->setRoles(['ROLE_USER']);
        self::assertEquals(array('0' => 'ROLE_USER'), $this->user->getRoles());
    }

    public function testEraseCredentials()
    {
        $user = $this->user;
        $this->user->eraseCredentials();
        self::assertEquals($user, $this->user);
    }


    public function testGetTask():void
    {
        $task = new Task();
        $response = $this->user->addTask($task);
        self::assertInstanceOf(User::class, $response);
        self::assertCount(1, $this->user->getTasks());
        self::assertTrue($this->user->getTasks()->contains($task));
        $response = $this->user->removeTask($task);
        self::assertInstanceOf(User::class, $response);
        self::assertCount(0, $this->user->getTasks());
        self::assertFalse($this->user->getTasks()->contains($task));
    }
}
