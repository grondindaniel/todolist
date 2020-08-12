<?php


namespace App\Tests\Controller;


use App\Controller\SecurityController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    private $client = null;

    public function setUp()
    {
        $this->client = static::createClient();
    }
    public function testLogin()
    {
        $this->client->request('GET', '/login');
        $this->assertSame(200, $this->client->getResponse()->getStatusCode());
    }

    public function testLogoutPage()
    {
        $this->client->request('GET', '/logout');
        $this->assertSame(302, $this->client->getResponse()->getStatusCode());
    }


    public function testLogout()
    {
        $this->expectException(\Exception::class);
        $controller = new SecurityController();
        $controller->logout();
    }

}
