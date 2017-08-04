<?php
class Controller_Uber_uns extends Controller
{
    function __construct()
    {
        $this->model = new Model_Uber_uns();
        $this->view = new View();
        $this->default_model = new Model_Default();
    }

    function action_index()
    {
        $default = $this->default_model->get_data();
        $data = $this->model->get_data();
        $this->view->generate('uber_uns_view.php', 'template_view.php', $data, $default);
    }
}