<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public const ADMIN_REFERENCE = 'ADMIN';
    public const USER_REFERENCE = 'USER';

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername("root");
        $user->setEmail("daniel@ac-nantes.fr");
        $user->setRoles(['ROLE_ADMIN']);
        $hash = password_hash('Xkeyscore', PASSWORD_ARGON2I);
        $user->setPassword($hash);
        $manager->persist($user);
        $this->setReference(self::ADMIN_REFERENCE, $user);

        $user = new User();
        $user->setUsername("claire");
        $user->setEmail("claire@free.fr");
        $user->setRoles(['ROLE_USER']);
        $hash = password_hash('Xkeyscore', PASSWORD_ARGON2I);
        $user->setPassword($hash);
        $manager->persist($user);
        $this->setReference(self::USER_REFERENCE,  $user);

        $user = new User();
        $user->setUsername("anne");
        $user->setEmail("anne@gmail.com");
        $user->setRoles(['ROLE_USER']);
        $hash = password_hash('Xkeyscore', PASSWORD_ARGON2I);
        $user->setPassword($hash);
        $manager->persist($user);
        $this->setReference(self::USER_REFERENCE,  $user);

        $user = new User();
        $user->setUsername("antoire");
        $user->setEmail("antoire@orange.fr");
        $user->setRoles(['ROLE_USER']);
        $hash = password_hash('Xkeyscore', PASSWORD_ARGON2I);
        $user->setPassword($hash);
        $manager->persist($user);
        $this->setReference(self::USER_REFERENCE,  $user);

        $user = new User();
        $user->setUsername("jean");
        $user->setEmail("jean@orange.fr");
        $user->setRoles(['ROLE_USER']);
        $hash = password_hash('Xkeyscore', PASSWORD_ARGON2I);
        $user->setPassword($hash);
        $manager->persist($user);
        $this->setReference(self::USER_REFERENCE,  $user);

        $manager->flush();
    }
}
