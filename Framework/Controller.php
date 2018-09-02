<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/30/2018
 * Time: 12:02 PM
 */

namespace Framework;


abstract class Controller
{
    protected $app;

    protected $errors = [];
    protected $table = '';

    public function __construct(Application $app)
    {
        $this->app = $app;
        echo $this->table;
    }

    function __get($name)
    {
        return $this->app->$name;
    }
}