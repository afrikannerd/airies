<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 9/15/2018
 * Time: 9:30 AM
 */

namespace App\Controllers\Admin;


use Framework\Controller;

class ExamController extends Controller
{
    function index()
    {
        $this->view->setTitle('Admin | Exams');
        return $this->view->render('admin/exams');
    }
}