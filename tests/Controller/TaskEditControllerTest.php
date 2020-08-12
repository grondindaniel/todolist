<?php


namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class TaskEditControllerTest extends WebTestCase
{
    public function testEditTask()
    {
        $t = 5;
        $client = static::createClient();
        $crawler = $client->request('GET', '/tasks/'.$t.'/edit');
        $form = $crawler->selectButton('Modifier')->form();
        $form['task[title]'] = 'Titre modifié';
        $form['task[content]'] = 'contenu modifié';

        $client->submit($form);
        $this->assertSame(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());

    }
}
