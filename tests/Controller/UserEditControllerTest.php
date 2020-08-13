<?php


namespace App\Tests\Controller;

use App\Tests\TraitConnect;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class UserEditControllerTest extends WebTestCase
{
    use FixturesTrait;
    use TraitConnect;

    public function testIndex()
    {
        $client = static::createClient();
        $users = $this->loadFixtureFiles([__DIR__ .'/user.yaml']);
        $user = $users['user'];
        $this->connect($client,$user);
        $client->request('GET', '/user/edit');
        $this->assertSelectorTextContains('h2', 'Choisir un utilisateur');

    }

    public function testIndexAction()
    {
        $client = static::createClient();
        $users = $this->loadFixtureFiles([__DIR__ .'/user.yaml']);
        $user = $users['user'];
        $this->connect($client,$user);
        $crawler = $client->request('GET', '/users/'.'5'.'/edit');
        $form = $crawler->selectButton('Modifier')->form();

        $form['user[username]'] = 'danieltest33';
        $form['user[email]'] = 'danieltest@user.com';
        $form['user[role]'] = 'ROLE_ADMIN';

        $client->submit($form);
        $this->assertStringContainsString('Modification ok', $client->getResponse()->getContent());

        echo $client->getResponse()->getContent();

    }

}
