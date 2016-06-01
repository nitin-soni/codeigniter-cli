<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Description of CacheClear
 *
 * @author Nitin Kumar Soni <soninitin27@gmail.com>
 */
class ClearCache extends Command
{

    protected function configure()
    {
        $this->setName('codeigniter:clear:cache')
                ->setDescription('Clear all cache')
                ->setHelp(<<<EOT
The <info>%command.name%</info> remove all items under your application/cache dir.
EOT
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file_dir = APPPATH . 'cache';
        $files = scandir($file_dir);
        unset($files[0]);
        unset($files[1]);
        if (empty($files))
        {
            $output->writeln('<question>There is no cache file to remove.</question>');
        }
        else
        {
            foreach ($files as $filename)
            {
                if (in_array($filename, array('index.html', '.htaccess')))
                {
                    continue;
                }
                $todo = (is_dir($file_dir . '/' . $filename) ? 'rmdir' : 'unlink');
                $todo($file_dir . '/' . $filename);
                $output->write('.');
            }
            $output->writeln("\n" . '<info>Cache cleared successfully.</info>');
        }
    }

}
