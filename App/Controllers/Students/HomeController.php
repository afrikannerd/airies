<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 9/6/2018
 * Time: 5:19 PM
 */

namespace App\Controllers\Students;


use Framework\Controller;

class HomeController extends Controller
{
    function index()
    {
        return $this->view->render('students/index');
    }

    function login()
    {
        /**
         * @var \App\Models\Users $user
         */
        $user = $this->load->model('Users');
        $path = explode('/',$this->route->getCurrent());
        $path = end($path);
        if($user->user())
        {
            return redirect('/student');
        }else{
            if( $user->login() )
            {
                
                $this->session->add('username',$user->user()->regid);
                
                $this->session->add('path',$path);

                return redirect('/student');
            }
        }


        return $this->view->render('students/login');
    }
    function result()
    {
        return $this->view->render('students/result');
    }

    function fee()
    {
        return $this->view->render('students/fees');
    }

}