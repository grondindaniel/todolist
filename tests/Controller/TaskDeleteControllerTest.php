<?php


namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;


class TaskDeleteControllerTest extends WebTestCase
{
    public function testDeleteTaskAction()
    {
        $client = static::createClient();
        $client->request('DELETE', '/tasks/10/delete', [], [], ['PHP_AUTH_USER' => 'daniel', 'PHP_AUTH_PW' => 'Xkeyscore']);
        $this->assertSame(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());
    }

}
