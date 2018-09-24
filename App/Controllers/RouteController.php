<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 9/7/2018
 * Time: 7:43 AM
 */

namespace App\Controllers;



use Framework\Controller;

class RouteController extends Controller
{

    /**
    * @var App\Models\Users $user
    */


    function index()
    {

        $controller = explode('/',$this->request->url())[1];

        $routes = $this->path->load('helpers/web');
        $redirect = '/login/';
        #dnd($this->app->route->getCurrent());

        $user = $this->load->model('Users');

        
        if($this->session->exists('path'))
        {
            $pattern = "#^\/".$this->session->get('path')."#i";
            /*
            if(in_array($this->request->url(), $routes[$this->session->get('path')])) {

                return true;
            }
            */
            if( preg_match($pattern,$this->request->url()))
            {
                return true;
            }

            return redirect('/'.$this->session->get('path'));
            
        }

        

        return redirect($redirect.$controller);
    }




}