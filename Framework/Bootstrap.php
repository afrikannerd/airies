<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/25/2018
 * Time: 7:28 AM
 */

namespace Framework;


class Bootstrap
{
    /**
     * @var Application $app
     */
    private $app;

    /**Controller object container
     * @var array $controllers
     */
    private $controllers = [];

    /**Model object container
     * @var array $models
     */
    private $models = [];

    /**Middleware Object container
     * @var array $middleware
     */
    private $middleware = [];

    /**
     * Bootstrap constructor.
     * @param \Framework\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @param $controller
     * @param $method
     * @param array $_
     * @return mixed
     */
    public function action($controller,$method, $_ = [])
    {
        $obj = $this->controller($controller);

        return call_user_func_array([$obj,$method],$_);
    }

    public function middleware()
    {

    }

    /**
     * @param $controller
     * @return object
     */
    public function controller($controller):object
    {
        $controller = $this->getControllerName($controller);

        if(!$this->controllerObjectExists($controller))
        {

            $this->addController($controller);
        }
        return $this->getController($controller);
    }

    /**
     * @param $controller
     * @return void
     */
    public function addController($controller):void
    {


        if($this->path->exists($controller))
        {

            $obj = new $controller($this->app);

            $this->controllers[$controller] = $obj;
            $this->controllers;

        }


    }

    /**
     * @param $controller
     * @return bool
     */
    public function controllerObjectExists($controller):bool
    {

        return isset($this->controllers[$controller]);

    }

    /**
     * @param $controller
     * @return string
     */
    public function getControllerName($controller):string
    {

        return str_replace("/","\\","\App\Controllers\\".$controller."Controller");

    }

    /**
     * @param $controller
     * @return object
     */
    public function getController($controller):object
    {

        return $this->controllers[$controller];

    }

    /**
     * @param $model
     * @return object
     */
    public function model($model):object
    {
        $model = $this->getModelName($model);
        if(!$this->modelObjectExists($model))
        {
            $this->addModel($model);
        }
        return $this->getModel($model);
    }

    /**
     * @param $model
     */
    public function addModel($model):void
    {
        if(file_exists($this->path->to($model)))
        {

            $obj = new $model($this->app);

            $this->models[$model] = $obj;

        }
    }

    /**
     * @param $model
     * @return bool
     */
    public function modelObjectExists($model):bool
    {
        return isset($this->models[$model]);
    }

    /**
     * @param $model
     * @return string
     */
    public function getModelName($model):string
    {

        return str_replace("/","\\","\App\Models\\".$model);

    }

    /**
     * @param $model
     * @return object
     */
    public function getModel($model):object
    {

        return $this->models[$model];

    }

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->app->$key;
    }
}