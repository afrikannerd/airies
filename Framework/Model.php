<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/30/2018
 * Time: 12:02 PM
 */

namespace Framework;


abstract class Model
{
    protected $app;


    protected $table = '';

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    function all()
    {

    }

    function get($id)
    {

    }


    function __call($method, $arguments)
    {
        return call_user_func_array([$this->app->db,$method],$arguments);
    }

    function __get($key)
    {
        return $this->app->$key;
    }
}