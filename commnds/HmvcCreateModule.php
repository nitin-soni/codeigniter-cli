<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Description of HmvcCreateModule
 *
 * @author Nitin Kumar Soni <soninitin27@gmail.com>
 */
class HmvcCreateModule extends Command
{

    protected function configure()
    {
        $this->setName('hmvc:module:create')
                ->setDescription('Create a new module')
                ->setHelp(<<<EOT
The <info>%command.name%</info> command create new module you names under your application/modules dir.
EOT
        );
    }

}
