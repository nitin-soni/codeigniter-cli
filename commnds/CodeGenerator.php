<?php

/**
 * Description of CodeTemplates
 *
 * @author Nitin Kumar Soni <soninitin27@gmail.com>
 */
class CodeGenerator
{

    /**
     * This function will provide controller code
     * @return string
     */
    private function controller($class_name)
    {
        $sql = <<<CODESTART
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of {$class_name}
 *
 * @author 
 */
class {$class_name} extends CI_Controller
{

    /**
     * Constructor for this controller.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        
    }

}

CODESTART;
        return $sql;
    }

    /**
     * Create file
     * @param type $file_path
     * @param type $file_type
     * @return boolean
     */
    function create_file($file_path, $file_type)
    {
        $class_name = basename($file_path, '.php');
        $file_content = $this->{$file_type}($class_name);
        return file_put_contents($file_path, $file_content);
    }

}
