<?php

namespace App;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use Symfony\Component\Console\Question\ChoiceQuestion;

class Quest extends Command
{
    protected static $defaultName = 'quest';

    protected function configure(): void
    {
        $this->setHelp('This command collects info about you and outputs it in console.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $helper = $this->getHelper('question');

        $outputStyleGreen = new OutputFormatterStyle('green');
        $outputStyleMagenta = new OutputFormatterStyle('magenta');

        $output->getFormatter()->setStyle('green', $outputStyleGreen);
        $output->getFormatter()->setStyle('pink', $outputStyleMagenta);

        $question = new Question('Введите Ваше имя: ', 'Не указано');
        $name = $helper->ask($input, $output, $question);

        $question = new Question('Введите Ваш возраст: ', 'Не указан');
        $age = $helper->ask($input, $output, $question);

        $question = new ChoiceQuestion(
            'Укажите Ваш пол: ',
            ['М', 'Ж'],
            0
        );
        $gender = $helper->ask($input, $output, $question);

        $output->writeln('Вас зовут: <green>' . $name . '</>');
        $output->writeln('Ваш возраст: <green>' . $age . '</>');
        $output->writeln('Ваш пол:' . (($gender === 'Ж') ? '<pink> ' : '<green> ') . $gender . '</>');

        return Command::SUCCESS;
    }
}
