<?php

class Controller_datenschutz extends Controller
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
        $this->view->generate('datenschutz_view.php', 'template_view.php', $data, $default);
    }

}
