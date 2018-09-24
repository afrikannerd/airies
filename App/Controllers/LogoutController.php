<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 9/15/2018
 * Time: 10:34 AM
 */

namespace App\Controllers;


use Framework\Controller;

class LogoutController extends Controller
{
    function index()
    {
        $redirect = preg_replace("#^\/logout#","/login",$this->route->getCurrent());

        if($this->session->exists('username'))
        {
            $this->session->clear();
            return redirect($redirect);
        }
        die('Error occured.Better call caleb');
    }
}