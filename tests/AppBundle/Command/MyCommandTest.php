<?php

namespace Tests\AppBundle\Command;

use AppBundle\Command\MyCommand;
use AppBundle\Service\MyService;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class MyCommandTest extends WebTestCase
{
    public function testCommand()
    {
        $kernel = $this->createKernel();
        $kernel->boot();

        // Create a stub for the SomeClass class.
        $stub = $this->getMockBuilder(MyService::class)->getMock();
        $stub->method('getData')->willReturn('foo');

        $consoleCommand = new MyCommand($stub);

        $application = new Application($kernel);
        $application->add($consoleCommand);

        $command = $application->find('app:my-command');
        $commandTester = new CommandTester($command);
        $commandTester->execute(['command' => $command->getName()]);

        $this->assertEquals(0, $commandTester->getStatusCode());
    }
}
