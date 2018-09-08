<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/25/2018
 * Time: 2:59 PM
 */

namespace App\Controllers\Students;




use Framework\Controller;


class DashboardController extends Controller
{



    function index()
    {
        return "Hey!I'ma fucking student";
    }

    function result()
    {

        $data['content'] = "This is what I'ma talk about";
        return $this->view->render("students/result",$data);
    }
}