<?php
class Controller_Handler_liste extends Controller
{
    function __construct()
    {
        $this->model = new Model_Handler_liste();
        $this->view = new View();
        $this->default_model = new Model_Default();
    }

    function action_index()
    {
        $default = $this->default_model->get_data();
        $data = $this->model->get_data();
        $this->view->generate('handler_liste_view.php', 'template_view.php',$data, $default);
    }
}