<?php


namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskDoneControllerTest extends WebTestCase
{

    public function testTaskDone()
    {
        $client = static::createClient();
        $client->request('GET','/task/done');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSelectorTextContains('h2', 'TACHES TERMINEES');
    }

}
