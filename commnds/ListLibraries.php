<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Description of ListLibraries
 *
 * @author Nitin Kumar Soni <soninitin27@gmail.com>
 */
class ListLibraries extends Command
{

    protected function configure()
    {
        $this->setName('codeigniter:list:libraries')
                ->setDescription('List all libraries')
                ->setHelp(<<<EOT
The <info>%command.name%</info> command list all libraries under your application/libraries dir.
EOT
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file_dir = APPPATH . 'libraries';
        $files = glob($file_dir . '/*.php');
        if (empty($files))
        {
            $output->writeln('<question>You did not created a library yet.</question>');
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
