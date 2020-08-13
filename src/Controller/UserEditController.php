<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserRegistrationType;
use App\Form\UserType;
use App\Repository\UserRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserEditController extends AbstractController
{
    /**
     * @Route("/user/edit", name="user_edit")
     */
    public function index(UserRepository $userRepository)
    {
        $user = $userRepository->findAll();
        return $this->render('user_edit/index.html.twig', array('users'=>$user));
    }

    /**
     * @Route("/users/{id}/edit", name="user_edit_page")
     */
    public function editAction(User $user, Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $passwordEncoder)
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $role = $form->get('role')->getData();
            $user->setRoles([$role]);
            $manager->flush();
            $this->addFlash('editOk', 'Utilisateur modifié avec succés');
            return $this->redirectToRoute('user_edit');

        }

        return $this->render('user_edit/edit_page.html.twig', ['form' => $form->createView(), 'user' => $user]);
    }
}
