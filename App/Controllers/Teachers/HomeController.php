<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/30/2018
 * Time: 11:09 AM
 */

namespace App\Controllers\Teachers;



use Framework\Controller;

class HomeController extends Controller
{



    function index()
    {
        return $this->view->render("teachers/index");
    }

    function exam()
    {
        return $this->view->render("teachers/exam");
    }

    function subject()
    {
        return $this->view->render("teachers/subject");
    }
}