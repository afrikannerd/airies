<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/29/2018
 * Time: 4:09 PM
 */

namespace Framework\Http;
if(!defined('ROOT'))exit("Get out!");
use Framework\Application;

class Response
{
    private $app;
    private $response = "";
    private $headers = [];

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    function setResponse($response)
    {
        $this->response = $response;
    }

    function respond()
    {

        $this->sendHeaders();
        $this->sendResponse();

    }

    function setHeader($headerstring)
    {

        $this->headers[] = $headerstring;

    }

    function sendHeaders()
    {

        foreach ($this->headers as $header)
        {

            header($header);

        }

    }

    private function sendResponse()
    {
        echo $this->response;
    }
}