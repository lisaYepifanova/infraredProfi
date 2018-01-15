<?php
class Controller_Produkte extends Controller
{
    function __construct()
    {
        $this->model = new Model_Unsere_produkte();
        $this->view = new View();
        $this->default_model = new Model_Default();
    }

    function action_index()
    {
        $default = $this->default_model->get_data();
        $data = $this->model->get_data();
        $this->view->generate('unsere_produkte_view.php', 'template_view.php', $data, $default);
    }
}