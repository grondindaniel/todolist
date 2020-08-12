<?php


namespace App\Tests\Security;


use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class LoginAuthenticatorTest extends WebTestCase
{

    use FixturesTrait;

    public function testLoginOK()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('Valider')->form();
        $form['username'] = 'daniel';
        $form['password'] = 'Xkeyscore';
        $client->submit($form);
        static::assertSame(200, $client->getResponse()->getStatusCode());
        $client->followRedirect();
        static::assertResponseRedirects('/AllTasks');
        echo $client->getResponse()->getContent();

    }
    public function testLoginIsBad()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('Valider')->form();
        $form['username'] = 'bad';
        $form['password'] = 'bad';
        $client->submit($form);
        static::assertSame(302, $client->getResponse()->getStatusCode());
        static::assertResponseRedirects('/');
        $client->followRedirect();
        static::assertSame(200, $client->getResponse()->getStatusCode());

    }

    public function testLogout()
    {
        $client = static::createClient();
        $client->request('GET', '/logout');
        static::assertSame(302, $client->getResponse()->getStatusCode());
        static::assertResponseRedirects('/login');
        $client->followRedirect();

        static::assertEquals(200, $client->getResponse()->getStatusCode());
    }

}
