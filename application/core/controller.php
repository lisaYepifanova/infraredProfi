<?php
define('MODELS',$_SERVER['DOCUMENT_ROOT'].'/application/models/');
include_once MODELS.'model_default.php';

define('PROJ_PATH', '/home/lisabeth/Projects/infraredprofi/');

class Controller
{

    public $model;
    public $view;
    public $default_model;

    function __construct()
    {
        $this->view = new View();
    }

    function action_index()
    {

    }
}
