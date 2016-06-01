#!/usr/bin/env php
<?php
// application.php

require __DIR__ . '/vendor/autoload.php';

//use Acme\Console\Command\GreetCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Output\OutputInterface;

$system_path = 'system';
$application_folder = 'application';
if (($_temp = realpath($system_path)) !== FALSE)
{
    $system_path = $_temp . DIRECTORY_SEPARATOR;
}
else
{
    // Ensure there's a trailing slash
    $system_path = strtr(
                    rtrim($system_path, '/\\'), '/\\', DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
            ) . DIRECTORY_SEPARATOR;
}
if (!is_dir($system_path))
{
    $setCodes = array(31);
    $unsetCodes = array(39);
    $text = 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: ' . pathinfo(__FILE__, PATHINFO_BASENAME);
    echo "\n" . "\033[31m" . $text . "\033[39m" . "\n\n";
    exit(3); // EXIT_CONFIG
}
if (is_dir($application_folder))
{
    if (($_temp = realpath($application_folder)) !== FALSE)
    {
        $application_folder = $_temp;
    }
    else
    {
        $application_folder = strtr(
                rtrim($application_folder, '/\\'), '/\\', DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
        );
    }
}
elseif (is_dir(BASEPATH . $application_folder . DIRECTORY_SEPARATOR))
{
    $application_folder = BASEPATH . strtr(
                    trim($application_folder, '/\\'), '/\\', DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
    );
}
else
{
    $text = 'Your application folder path does not appear to be set correctly. Please open the following file and correct this: ' . SELF;
    echo "\n" . "\033[31m" . $text . "\033[39m" . "\n\n";
    exit(3); // EXIT_CONFIG
}

define('ENVIRONMENT', 'development');
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('BASEPATH', $system_path);
define('FCPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('SYSDIR', basename(BASEPATH));
define('APPPATH', $application_folder . DIRECTORY_SEPARATOR);


//common function
if (!function_exists('valid_class_name'))
{

    function valid_class_name($input)
    {
        return preg_match('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/', $input);
    }

}


$console_app = new Application("CodeIgniter Command Line Tool Developed by Nitin Kumar Soni", '1.1');
foreach (glob(__DIR__ . "/commnds/*.php") as $filename)
{
    $class_name = basename($filename, ".php");
    require $filename;
    if ($class_name == 'CodeGenerator')
    {
        continue;
    }
    $console_app->add(new $class_name);
}

$console_app->run();
