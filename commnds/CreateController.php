<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;

/**
 * Description of CreateController
 *
 * @author Nitin Kumar Soni <soninitin27@gmail.com>
 */
class CreateController extends Command
{

    protected function configure()
    {
        $this->setName('codeigniter:create:controller')
                ->setDescription('Create a new controller')
                ->setHelp(<<<EOT
The <info>%command.name%</info> command list all controllers under your application/controllers dir.
EOT
        );
        $this->setDefinition(array(
            new InputOption('dir', '', InputOption::VALUE_REQUIRED, 'The directory where to create the bundle', 'src/'),
            new InputOption('module-name', '', InputOption::VALUE_REQUIRED, 'The optional bundle name'),
        ));
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //$questionHelper = $this->getQuestionHelper();
        $file_dir = APPPATH . 'controllers/';
        $helper = $this->getHelper('question');
        $question = new Question('<info>Please enter the name of the controller </info>');
        $file_name = $helper->ask($input, $output, $question);
        //validate class name
        $class_name = ucfirst(strtolower($file_name));
        $file_name = $file_dir . $class_name . '.php';
        if (valid_class_name($class_name) == FALSE)
        {
            $output->writeln('<error>You entered an invalid class name. Read guid line at </error><info>http://php.net/manual/en/language.oop5.basic.php</info>');
        }
        elseif (file_exists($file_name))
        {
            $output->writeln('<error>File already exist</error>');
        }
        else
        {
            $question = new ConfirmationQuestion('<info>This will create a new class file at ' . $file_name . ' (y/n)</info>', 'y', '/^(y|j)/i');
            $confirmation = $helper->ask($input, $output, $question);
            if ($confirmation)
            {
                $code_generator = new CodeGenerator();
                $file = $code_generator->create_file($file_name, 'controller');
                if ($file === FALSE)
                {
                    $output->writeln('<error>Some error occured. Please check you have sufficient permissions to write file.</error>');
                }
                else
                {
                    $output->writeln('<info>Controller created successfully.</info>');
                }
            }
        }
    }

}
