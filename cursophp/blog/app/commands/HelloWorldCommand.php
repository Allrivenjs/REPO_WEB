<?php

namespace app\commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorldCommand extends Command
{
    protected static $defaultName = 'app:hello-world';

    protected function configure(): void
    {
        $this
            // ...
            ->addArgument('name', InputArgument::REQUIRED, 'name');
    }
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->write('Hello ' . $input->getArgument('name'));
        return Command::SUCCESS;


    }

}