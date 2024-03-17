<?php
require_once ("controllers/base_controller.php");

class PagesController extends BaseController
{
    function __construct()
    {
        $this->folder = "pages";
    }

    function home()
    {
        $data = array(
            "name" => "coong dep trai",
            "age" => 22
        );
        $this->render("home", $data);
    }

    function error()
    {
        $this->render("error");
    }
}