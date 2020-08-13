<?php


namespace App\Tests\Controller;


use App\Tests\TraitConnect;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class TaskToggleControllerTest extends WebTestCase
{
    use FixturesTrait;
    use TraitConnect;

    public function testToggle()
    {
        $client = static::createClient();
        $users = $this->loadFixtureFiles([__DIR__ .'/user.yaml']);
        $user = $users['user'];
        $this->connect($client,$user);
        $client->request('GET', '/tasks/4/toggle');

        $this->assertSame(Response::HTTP_OK, $client->getResponse()->getStatusCode());

    }
}
