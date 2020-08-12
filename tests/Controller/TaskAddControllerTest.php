<?php


namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskAddControllerTest extends WebTestCase
{

    public function testTaskCreate()
    {
        $client = static::createClient();
        $crawler = $client->request('GET','/add_task');
        $form = $crawler->filter("form[name=task]")->form([
            'task[title]' => 'a task to test',
            'task[content]' => 'always test the code !'
        ]);

        $client->submit($form);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());

        $client->followRedirect();

    }

}
