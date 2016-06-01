<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Description of ListControlllers
 *
 * @author Nitin Kumar Soni <soninitin27@gmail.com>
 */
class ListControlllers extends Command
{

    protected function configure()
    {
        $this->setName('codeigniter:list:controllers')
                ->setDescription('List all controllers')
                ->setHelp(<<<EOT
The <info>%command.name%</info> command list all controllers under your application/controllers dir.
EOT
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file_dir = APPPATH . 'controllers';
        $files = glob($file_dir . '/*.php');
        if (empty($files))
        {
            $output->writeln('<question>You did not created a controller yet.</question>');
        }
        else
        {
            foreach ($files as $filename)
            {
                $output->writeln('<comment>' . basename($filename) . '</comment>');
            }
        }
    }

}
