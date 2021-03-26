<?php

namespace App\Command;

use App\Entity\Tasks;
use App\Service\DeveloperTasks\DeveloperTasksService;
use App\Service\ProviderTasks\ProviderTasks;
use App\Service\ProviderTasks\ProviderTasksAdapter;
use App\Service\RabbitMq\RabbitMqService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateTaskService extends Command
{
    private $database = null;
    protected static $defaultName = 'app:create-task-service';

    public function __construct(EntityManagerInterface $em) {
        parent::__construct();
        $this->database = $em;
    }

    protected function configure()
    {
        $this->setDescription('TASK JOB CREATOR')
            ->addArgument('url', InputArgument::OPTIONAL, 'Url ?')
            ->addArgument('providerType', InputArgument::OPTIONAL, 'Provider Type ?');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {

            $providerUrl = $input->getArgument('url');
            $providerType = $input->getArgument('providerType');
            $newProvider = new ProviderTasks($providerUrl,$providerType);
            $newProviderAdapter = new ProviderTasksAdapter($newProvider,$this->database);
            $newProviderAdapter->setDbWrite();

            $taskList = new DeveloperTasksService($newProviderAdapter->getAll());
            $taskList->setTasksToLevel();

            foreach ($taskList->getTasksToLevel() as $tasks){
                foreach ($tasks->tasks as $k => $r){
                    $newRabbitMq = new RabbitMqService();
                    $newRabbitMq->newQueue("DEV:".$tasks->level.":WEEK:".($k+1).":TASK:".$r->lists_text,"TasksDEV".($k+1));
                    $newRabbitMq->closeConnection();
                }
            }

            $output->writeln('Okay! '.$providerType.' data write');
            return Command::SUCCESS;
        }
        catch (\Exception $e){
            $output->writeln('Error ! '.$e->getMessage());
            return Command::FAILURE;
        }
    }
}