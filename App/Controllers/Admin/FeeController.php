<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 9/10/2018
 * Time: 7:50 PM
 */

namespace App\Controllers\Admin;


use Framework\Controller;

class FeeController extends Controller
{

    function index()
    {
        $this->view->setTitle('Admin | Fees');
        return $this->view->render('admin/fees');
    }
}