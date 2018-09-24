<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/25/2018
 * Time: 1:43 PM
 */

namespace App\Controllers\Admin;


use Framework\Controller;

class HomeController extends Controller
{
    function index()
    {
        return $this->view->render('home/index');
    }
    function admin()
    {
        $this->view->setTitle('Admin | Dashboard');
        return $this->view->render('admin/index');
    }
    function submit()
    {
        return redirect("/login/admin");
    }
    function teacher()
    {
        return $this->view->render('admin/teacher');
    }

    function student()
    {
        return redirect('/login/student');
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
            return redirect('/admin');
        }else{
            if( $user->admin() )
            {
                
                $this->session->add('username',$user->user()->email);
                $this->session->add('name',$user->user()->name);
                $this->session->add('path',$path);
                #dnd($this->session->get('username'));
                return redirect('/admin');
            }
        }


        return $this->view->render('admin/login');
    }
}