<?php

namespace App\DataFixtures;

use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TaskFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i <= 10; $i++) {
            $task = new Task();
            $task->setTitle('Tache :' . $i);
            $task->setContent('Tache à faire :'. $i);
            $task->setCreatedAt(new \DateTime());

            if (in_array($i, [1,6])){
                $task->setUser($this->getReference(UserFixtures::USER_REFERENCE));
            }
            elseif (in_array($i, [2,7])) {
                $task->setUser($this->getReference(UserFixtures::ADMIN_REFERENCE));
            }
            else {
                $task->setUser(null);
            }
            $manager->persist($task);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }

}
