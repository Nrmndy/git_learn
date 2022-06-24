<?php

namespace App;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class Repeater extends Command
{
    protected static $defaultName = 'repeat';
	
	protected function configure(): void
    {
        $this
            ->setHelp('This command repeats your Input several times')
		    ->addArgument('userInput', InputArgument::REQUIRED, 'The Input to repeat.')
		    ->addArgument('counter', InputArgument::OPTIONAL, 'How many times you want to repeat your phrase?')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
		$counter = $input->getArgument('counter') ?? 2;
		
		for ($i = 0; $i < $counter; $i++) {
		    $output->writeln($input->getArgument('userInput'));
		}
        return Command::SUCCESS;
    }
}