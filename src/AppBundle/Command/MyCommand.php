<?php

namespace AppBundle\Command;

use AppBundle\Service\MyService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MyCommand extends Command
{
    /**
     * @var MyService
     */
    private $service;

    /**
     * @param MyService $service
     */
    public function __construct(MyService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    protected function configure()
    {
        $this->setName('app:my-command');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->service->getData();
        
        $output->write('done');
    }

}
