<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/30/2018
 * Time: 11:09 AM
 */

namespace App\Controllers\Teachers;



use Framework\Controller;

class HomeController extends Controller
{



    function index()
    {
        $data['user'] = $this->load->model('Users')->details();
        
        return $this->view->render("teachers/index",$data);
    }

    function exam()
    {
        $user = $this->app->load->model('Users')->index();
        #$this->app->add('user',$user);
        return $this->view->render("teachers/exam");
    }

    function subject()
    {
        return $this->view->render("teachers/subject");
    }
}