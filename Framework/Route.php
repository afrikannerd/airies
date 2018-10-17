<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/25/2018
 * Time: 2:55 PM
 */

namespace Framework;

if(!defined('ROOT'))exit("Get out!");
class Route
{
    /**
     * @var Framework\Application $app
     */
    private $app;
    private $routes = [];
    private $current = "";
    private $notFound;
    private $priorCalls = [];
    /**
     * Route constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function addPriorCalls(\Closure $callable)
    {
        $this->priorCalls[] = $callable;
    }

    function existsPrior(){
        return !empty($this->priorCalls);

    }

    function executePrior()
    {
        foreach ($this->priorCalls as $prior)
        {
            $prior->__invoke($this->app);
        }
    }
    public function getRoute()
    {
        foreach ($this->routes as $route)
        {
            if($this->matches($route["pattern"]) && $this->verifyRequestMethod($route["method"]))
            {
                $args = $this->getArgsFrom($route["pattern"]);

                list($controller,$action) = explode("@", $route['action']);
                $this->current = $route['url'];
                return [$controller,$action,$args];
            }
        }

        #die($this->app->request->url());
        return ['HttpError','index',[$this->app->request->url()]];
    }

    public function error404($path)
    {
        $this->notFound = $path;
    }

    public function add(string $url,string $action,$method = "GET")
    {
        $this->routes[] = [

            "url" => $url,
            "action" => $this->getAction($action),
            "method" => $method,
            "pattern" => $this->urlPattern($url),

        ];

    }

    private function urlPattern(string $url):string
    {
        $pattern  = "#^";
        $pattern .= str_replace([':text',':id'],['([a-z0-9-])','(\d+)'],$url);
        $pattern .= "$#i";
        return $pattern;

    }


    private function getAction(string $action):string
    {
        $action = str_replace("/","\\", $action );
        return strpos($action,"@") !== false ? $action : $action."@index";
    }

    public function matches($pattern):bool
    {
        return preg_match($pattern, $this->app->request->url());
    }

    public function verifyRequestMethod($method):bool
    {


        return ($method === $this->app->request->method());
    }

    public function getArgsFrom($url)
    {
        preg_match($url,$this->app->request->url(),$matches);
        array_shift($matches);

        return $matches;
    }

    function getCurrent()
    {
        return $this->current;
    }

}