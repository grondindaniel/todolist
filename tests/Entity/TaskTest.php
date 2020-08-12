<?php


namespace App\Tests\Entity;

use App\Entity\Task;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class TaskTest
 *
 * @package Tests\AppBundle\Entity
 */
class TaskTest extends KernelTestCase
{
    private $task;
    private $createdAt;
    private $user;

    public function setUp(): void
    {
        $this->task = new Task();
        $this->createdAt = new \DateTime();
        $this->user = new User();
    }

    public function testCreatedAt()
    {
        $this->task->setCreatedAt(new \DateTime);
        self::assertEquals(date('Y-m-d H:i:s'), $this->task->getCreatedAt()->format('Y-m-d H:i:s'));
    }

    public function getTaskEntity($title, $content): Task
    {
        $task = new Task();
        $task->setTitle($title);
        $task->setContent($content);
        $task->getCreatedAt();
        return $task;
    }


}
