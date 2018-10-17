<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/30/2018
 * Time: 12:02 PM
 */

namespace Framework;

if(!defined('ROOT'))exit("Get out!");
abstract class Controller
{
    protected $app;

    protected $errors = [];
    protected $table = '';
    protected $paginate;

    public function __construct(Application $app)
    {
        $this->app = $app;

        #$this->paginate = new Pagination();
    }

    function __get($name)
    {
        return $this->app->$name;
    }
}
