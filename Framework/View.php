<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/29/2018
 * Time: 9:54 PM
 */

namespace Framework;


class View
{
    /**
     * @var Application $app
     */
    private $app;

    private $title = TITLE;
    private $payload  = null;
    private $data = [];
    private $path;
    private $layout;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    function setTitle($title)
    {
        $this->title = $title;
    }

    public function render($view,&$data = []):string
    {
        $this->viewPath($view);
        $this->data = $data;

        return $this->content();
    }

    private function viewPath($view):void
    {
        list($dir,$file) = explode("/",$view,2);
        $view = "App\\Views\\".$view;
        $this->path = $this->app->path->to($view);
        $this->layout = $this->app->path->to("App\\Views\\{$dir}\\layout");
    }

    private function content()
    {
        if(is_null($this->payload))
        {
            ob_start();
            extract($this->data);
            include_once $this->layout;


            $this->payload = ob_get_clean();
        }

        return $this->payload;
    }

    function __get($name)
    {
        return $this->app->$name;
    }

    public function __toString()
    {
        return $this->content();
    }
}