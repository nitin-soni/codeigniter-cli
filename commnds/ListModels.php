<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Description of ListModels
 *
 * @author Nitin Kumar Soni <soninitin27@gmail.com>
 */
class ListModels extends Command
{

    protected function configure()
    {
        $this->setName('codeigniter:list:models')
                ->setDescription('List all models')
                ->setHelp(<<<EOT
The <info>%command.name%</info> command list all models under your application/models dir.
EOT
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file_dir = APPPATH . 'models';
        $files = glob($file_dir . '/*.php');
        if (empty($files))
        {
            $output->writeln('<question>You did not created a model yet.</question>');
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
