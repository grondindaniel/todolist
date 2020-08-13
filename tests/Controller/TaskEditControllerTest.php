<?php


namespace App\Tests\Controller;


use App\Tests\TraitConnect;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class TaskEditControllerTest extends WebTestCase
{
    use FixturesTrait;
    use TraitConnect;

    public function testEditTask()
    {
        $t = 5;
        $client = static::createClient();
        $users = $this->loadFixtureFiles([__DIR__ .'/user.yaml']);
        $user = $users['user'];
        $this->connect($client,$user);
        $crawler = $client->request('GET', '/tasks/'.$t.'/edit');
        $form = $crawler->selectButton('Modifier')->form();
        $form['task[title]'] = 'Titre modifié';
        $form['task[content]'] = 'contenu modifié';

        $client->submit($form);
        $this->assertSame(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());

    }
}
