<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserRegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/registration", name="registration")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager)
    {
        $user = new User();
        $form = $this->createForm(UserRegistrationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $role = $form->get('role')->getData();
            $user->setPassword($passwordEncoder->encodePassword($user->setRoles([$role]), $form->get('password')->getData()));
            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash('registerOk', 'Enregistrement ok');
            return $this->redirectToRoute('registration');
        }

        return $this->render('registration/index.html.twig', ['registrationForm' => $form->createView()]);
    }
}
