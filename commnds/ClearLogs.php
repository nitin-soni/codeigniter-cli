<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Description of ClearLogs
 *
 * @author Nitin Kumar Soni <soninitin27@gmail.com>
 */
class ClearLogs extends Command
{

    protected function configure()
    {
        $this->setName('codeigniter:clear:logs')
                ->setDescription('Clear all logs')
                ->setHelp(<<<EOT
The <info>%command.name%</info> remove all items under your application/logs dir.
EOT
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file_dir = APPPATH . 'logs';
        $files = glob($file_dir . '/*.php');
        if (empty($files))
        {
            $output->writeln('<question>There is no log file to remove.</question>');
        }
        else
        {
            foreach ($files as $filename)
            {
                unlink($filename);
                $output->write('.');
            }
            $output->writeln("\n" . '<info>Logs cleared successfully.</info>');
        }
    }

}
