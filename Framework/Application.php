<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Framework;

/**
 * Description of Application
 *
 * @author nerd
 */
class Application {
    /**
     * @var Application | null
     */
    public static $app = null;
    /**Object Containers
     * @var array
     */
    public $container = [];

    /**
     * Application constructor.
     * @param Path $path
     */
    public function __construct(Path $path = null )
    {
        if(is_null($path)){
            $path = new Path(ROOT);
        }
        $this->add('path',$path);
        $this->registerCore();

        $this->path->load("helpers/functions");

    }

    /**
     * @param Path $path
     * @return mixed
     */
    public static function getInstance(Path $path = null)
    {
        if(is_null(static::$app))
        {
            static::$app = new static($path);
        }

        return static::$app;
    }

    public function boot()
    {
        $this->session->init();
        $this->request->url();
        $this->path->load("helpers/routes");
        list($controller,$action,$args) = $this->route->getRoute();
        if( $this->route->existsPrior())
        {
            $this->route->executePrior();
        }
        $output =  $this->load->action($controller,$action,$args);
        
        $this->response->setResponse($output);
        $this->response->respond();
    }

    /**
     * @param string $key
     * @param object $obj
     */
    public function add(string $key, object $obj):void
    {
        if($obj instanceof \Closure)
        {
            $obj = $obj->__invoke($this);
        }

        $this->container[$key] = $obj;

    }

    /**
     * @param $key
     * @return bool
     */
    public function added($key):bool
    {
        return isset($this->container[$key]);
    }

    /**
     * @return array
     */
    public function core():array
    {


        return [
            "load" => "\\Framework\\Bootstrap",
            "route" => "\\Framework\\Route",
            "validate" => "\\Framework\\Validation",
            "request" => "\\Framework\\Http\\Request",
            "response" => "\\Framework\\Http\\Response",
            "db" => "\\Framework\\Schema",
            "cookie" => "\\Framework\\Cookie",
            "session" => "\\Framework\\Sessions\\Session",
            "view" => "\\Framework\\View",

        ];
    }

    /**
     * @param $key
     * @return bool
     */
    public function isCore($key):bool
    {

        return array_key_exists($key,$this->core());

    }

    /**
     * @param $key
     * @return object
     */
    public function get($key):object
    {
        if(!$this->added($key))
        {
            if($this->isCore($key))
            {

                $this->add($key,$this->createObject($key));
            }else{
                die("Key ".$key." not found in the core applications");
            }
        }

        return $this->container[$key];
    }

    /**
     * @param $key
     * @return array
     * @return bool false
     */
    public function createObject($key)
    {

        $arr = $this->core();
        if(array_key_exists($key,$arr))
        {

            $obj = new $arr[$key]($this);
            return $obj;
        }

       return false;

    }

    /**
     * @param $key
     * @return object
     */
    public function __get($key)
    {
        return $this->get($key);
    }

    /**
     * @return bool
     */
    private function registerCore()
    {
        return spl_autoload_register([$this,'autoregister']);
    }

    /**
     * @param $class
     */
    private function autoregister($class)
    {

        if($this->path->exists($class))
        {
            $this->path->load($class);
        }
    }
}
