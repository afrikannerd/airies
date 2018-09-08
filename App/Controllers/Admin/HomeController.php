<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/25/2018
 * Time: 1:43 PM
 */

namespace App\Controllers\Admin;


use Framework\Controller;

class HomeController extends Controller
{
    function index()
    {
        return "Hello Amolo";
    }

    function submit()
    {
        return redirect("/login/admin");
    }
    function teacher()
    {
        return redirect('/login/teacher');
    }

    function student()
    {
        return redirect('/login/student');
    }

    function login()
    {
        return $this->view->render('admin/login');
    }
}