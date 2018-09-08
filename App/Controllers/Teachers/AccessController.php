<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 9/4/2018
 * Time: 6:19 PM
 */

namespace App\Controllers\Teachers;


use Framework\Controller;

class AccessController extends Controller
{

    function login()
    {
        return $this->view->render('teachers/login');
    }
}