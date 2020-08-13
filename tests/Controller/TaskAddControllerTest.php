<?php


namespace App\Tests\Controller;


use App\Tests\TraitConnect;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskAddControllerTest extends WebTestCase
{

    use FixturesTrait;
    use TraitConnect;

    public function testTaskCreate()
    {
        $client = static::createClient();
        $users = $this->loadFixtureFiles([__DIR__ .'/user.yaml']);
        $user = $users['user'];
        $this->connect($client,$user);
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
