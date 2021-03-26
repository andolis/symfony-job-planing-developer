<?php

namespace App\Controller;

use App\Entity\Tasks;
//use App\Service\DeveloperTasks\DeveloperTasks;
use App\Service\DeveloperTasks\DeveloperTasksService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $tasks = $this->getDoctrine()
            ->getRepository(Tasks::class)
            ->findAll();

        if (!$tasks) {
            throw $this->createNotFoundException(
                'No task list'
            );
        }

        $taskList = new DeveloperTasksService($tasks);
        $taskList->setTasksToLevel();
        $taskList->sortTasksList();
        $taskList->sortTasksDuration();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'taskList' => $taskList->getTasksToLevel()
        ]);
    }
}
