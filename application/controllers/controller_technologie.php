<?php
class Controller_Technologie extends Controller
{
    function __construct()
    {
        $this->model = new Model_Technologie();
        $this->view = new View();
        $this->default_model = new Model_Default();
    }

    function action_index()
    {
        $default = $this->default_model->get_data();
        $data = $this->model->get_data();
        $this->view->generate('technologie_view.php', 'template_view.php', $data, $default);
    }
}