<?php


namespace App\Tests\Controller;



use App\Tests\TraitConnect;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class RegistrationControllerTest extends WebTestCase
{

    use FixturesTrait;
    use TraitConnect;

    public function testRegistration()
    {

        $client = static::createClient();
        $users = $this->loadFixtureFiles([__DIR__ .'/user.yaml']);
        $user = $users['user'];
        $this->connect($client,$user);
        $crawler = $client->request('GET', '/registration');
        $form = $crawler->selectButton('Ajouter')->form();

        $form['user_registration[username]'] = 'danieltest3';
        $form['user_registration[email]'] = 'danieltest@user.com';
        $form['user_registration[role]'] = 'ROLE_ADMIN';
        $form['user_registration[password][first]'] = 'Xkeyscore';
        $form['user_registration[password][second]'] = 'Xkeyscore';

        $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirect());
        $client->followRedirect();
        $this->assertContains('Enregistrement ok', $client->getResponse()->getContent());

        echo $client->getResponse()->getContent();

    }

}
