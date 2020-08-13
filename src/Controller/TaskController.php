<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    /**
     * @Route("/task", name="AllTasks")
     */
    public function index(TaskRepository $taskRepository)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $task = $taskRepository->findBy(array('isDone'=>false), array('id' => 'DESC'));
        return $this->render('task/index.html.twig', array('tasks'=>$task));
    }
}
