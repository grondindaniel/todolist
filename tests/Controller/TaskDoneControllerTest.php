<?php


namespace App\Tests\Controller;


use App\Tests\TraitConnect;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskDoneControllerTest extends WebTestCase
{
    use FixturesTrait;
    use TraitConnect;

    public function testTaskDone()
    {
        $client = static::createClient();
        $users = $this->loadFixtureFiles([__DIR__ .'/user.yaml']);
        $user = $users['user'];
        $this->connect($client,$user);
        $client->request('GET','/task/done');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSelectorTextContains('h2', 'TACHES TERMINEES');
    }

}
