<?php


namespace App\Tests\Controller;

use App\Tests\TraitConnect;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;


class TaskDeleteControllerTest extends WebTestCase
{
    use FixturesTrait;
    use TraitConnect;

    public function testDeleteTaskAction()
    {
        $client = static::createClient();
        $users = $this->loadFixtureFiles([__DIR__ .'/user.yaml']);
        $user = $users['user'];
        $this->connect($client,$user);
        $client->request('DELETE', '/tasks/10/delete', [], [], ['PHP_AUTH_USER' => 'daniel', 'PHP_AUTH_PW' => 'Xkeyscore']);
        $this->assertSame(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());
    }

}
