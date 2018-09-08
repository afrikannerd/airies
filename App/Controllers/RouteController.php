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
    private $user;
    function index()
    {
        
        $this->user = $this->app->load->model('Users');
        if($this->user->authenticated())
        {
            //if(in_array($this->app->request->url(), REGISTERED_ROUTES))
            return true;
        }
        $redirect = '/login/';

        list($empty,$controller) = explode("/",$this->app->request->url());

        return redirect($redirect.$controller);
    }
}