<?php

namespace Laravel\BoilerplatePackage\Console\Commands;

use Composer\Command\BaseCommand as CommandBaseCommand;
use Symfony\Component\Console\Command\BaseCommand;;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class CreateProjectCommand extends CommandBaseCommand
{
    protected function configure()
    {
        $this
            ->setName('create-project')
            ->setDescription('Create a new Laravel project using the boilerplate package')
            ->addArgument('name', InputArgument::REQUIRED, 'The name of the project');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');
        $output->writeln("Creating a new Laravel project named $name...");

        $process = new Process(["composer", "create-project", "laravelabcd/boilerplate-package:1.0.0", $name]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $output->writeln("Project $name created successfully.");
        return 0;
    }
}
