<?php


namespace App\Tests\Controller;


use App\Tests\TraitConnect;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class TaskControllerTest extends WebTestCase
{
    use FixturesTrait;
    use TraitConnect;

    public function testIndex()
    {
        $client = static::createClient();
        $users = $this->loadFixtureFiles([__DIR__ .'/user.yaml']);
        $user = $users['user'];
        $this->connect($client,$user);
        $client->request('GET', '/task');
        $this->assertSame(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }
}
