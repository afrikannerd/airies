<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/25/2018
 * Time: 1:43 PM
 */

namespace App\Controllers\Admin;


class HomeController
{
    function index()
    {
        return "Hello Amolo";
    }

    function submit()
    {
        return redirect("/");
    }
    function two()
    {
        return 7777777777777777777777;
    }
}