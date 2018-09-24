<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/29/2018
 * Time: 9:09 PM
 */

namespace App\Controllers;


use Framework\Controller;

class HttpErrorController extends Controller
{
function index($path)
{

    $data['route'] = $path;

    return $this->view->render('error404',$data);
}
}