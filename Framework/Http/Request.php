<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/29/2018
 * Time: 3:03 PM
 */

namespace Framework\Http;

if(!defined('ROOT'))exit("Get out!");
use Framework\Application;

class Request
{
    /**
     * @var Framework\Application $app
     */
    private $app;
    /**
     * @var string $url
     */
    private $url;

    /**
     * Request constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function url()
    {
        $uri = rtrim($this->server("REQUEST_URI"),'/');
        $script = $this->server("SCRIPT_NAME");

        if(strpos($uri,'?') !== false)
        {
            list($uri,$query) = explode("?",$uri,2);
        }
        $this->url = str_replace($script,'',$uri);

        if(!$this->url)
        {
            $this->url = "/";
        }

        return $this->url;
    }

    function post($index)
    {
        return isset($_POST[$index]) ? $_POST[$index] :  NULL;
    }

    function get($index)
    {
        return isset($_GET[$index]) ? $_GET[$index] :  NULL;
    }

    function server($index)
    {
        return isset($_SERVER[$index]) ? $_SERVER[$index] :  new \Exception("Unkown to Server");
    }

    function method()
    {
        return $this->server("REQUEST_METHOD");
    }

    function file()
    {

    }
}