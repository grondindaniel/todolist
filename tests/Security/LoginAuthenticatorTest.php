<?php


namespace App\Tests\Security;


use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;


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
        $this->assertSame(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());


    }

    public function testLogout()
    {
        $client = static::createClient();
        $client->request('GET', '/logout');
        $this->assertSame(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());
    }

}
