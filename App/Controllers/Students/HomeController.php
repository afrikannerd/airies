<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 9/6/2018
 * Time: 5:19 PM
 */

namespace App\Controllers\Students;


use Framework\Controller;

class HomeController extends Controller
{
    function index()
    {}

    function login()
    {
        return $this->view->render('students/login');
    }


}