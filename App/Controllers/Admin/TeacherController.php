<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 9/15/2018
 * Time: 9:32 AM
 */

namespace App\Controllers\Admin;


use Framework\Controller;

class TeacherController extends Controller
{

    function index()
    {
        $this->view->setTitle('Admin | Teachers');
        return $this->view->render('admin/teachers');
    }
}