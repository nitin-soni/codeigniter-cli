<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Description of HmvcListModules
 *
 * @author Nitin Kumar Soni <soninitin27@gmail.com>
 */
class HmvcListModules extends Command
{

    protected function configure()
    {
        $this->setName('hmvc:module:list')
                ->setDescription('Create a new module')
                ->setHelp(<<<EOT
The <info>%command.name%</info> command list all modules under your application/modules dir.
EOT
        );
    }

}
