<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TaskDoneController extends AbstractController
{
    /**
     * @Route("/task/done", name="task_done")
     */
    public function index(TaskRepository $taskRepository)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $task = $taskRepository->findBy(array('isDone'=>true), array('id' => 'DESC'));
        return $this->render('task_done/index.html.twig', array('tasks'=>$task));
    }
}
