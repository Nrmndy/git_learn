<?php

namespace App;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class SayHello extends Command
{
    protected static $defaultName = 'say_hello';

    protected function configure(): void
    {
        $this
            ->setHelp('This command says Hello to your Input')
            ->addArgument('userInput', InputArgument::REQUIRED, 'The Input to say hello to.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Привет '.$input->getArgument('userInput'));
        return Command::SUCCESS;
    }
}
