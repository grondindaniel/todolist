<?php

namespace App\Controller;

use App\Form\TaskType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TaskAddController extends AbstractController
{
    /**
     * @Route("/add_task", name="AddTasks")
     */
    public function addTask(Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(taskType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $task = $form->getData();
            $manager->persist($task);
            $manager->flush();
            $this->addFlash('success', 'La tâche a été bien été ajoutée.');

            return $this->redirectToRoute('AddTasks');

        }
        return $this->render('task_add/index.html.twig', array('form'=>$form->createView()));
    }
}
