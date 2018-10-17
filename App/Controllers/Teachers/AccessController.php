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
         /**
         * @var \App\Models\Users $user
         */
        $data['pages'] = $this->paginate->pagelinks();
        $user = $this->load->model('Users');
        
        $path = explode('/',$this->route->getCurrent());
        $path = end($path);
        if($user->user())
        {
            return redirect('/teacher');
        }else{
            if( $user->login() )
            {
                #dnd($user->login());
                $this->session->add('username',$user->user()->regid);
                
                $this->session->add('path',$path);
                #dnd($this->session->get('username'));
                return redirect('/teacher');
            }
        }


        return $this->view->render('teachers/login',$data);
    }
}