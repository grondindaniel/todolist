<?php


namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class TaskToggleControllerTest extends WebTestCase
{


    public function testToggle()
    {
        $client = $this->createClient();
        $client->request('GET', '/tasks/4/toggle');

        $this->assertSame(Response::HTTP_OK, $client->getResponse()->getStatusCode());

    }
}
