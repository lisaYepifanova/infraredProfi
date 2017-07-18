<?php
class Controller_Faq extends Controller
{
    function __construct()
    {
        $this->model = new Model_Faq();
        $this->view = new View();
        $this->default_model = new Model_Default();
    }

    function action_index()
    {
        $default = $this->default_model->get_data();
        $data = $this->model->get_data();
        $this->view->generate('faq_view.php', 'template_view.php', $data, $default);
    }
}