<?php

class Controller_404 extends Controller
{

    function __construct()
    {
        $this->view = new View();
        $this->default_model = new Model_Default();
    }

    function action_index()
    {
        $data = "";
        $default = $this->default_model->get_data();
        $this->view->generate('404_view.php', 'template_view.php', $data, $default);
    }

}
