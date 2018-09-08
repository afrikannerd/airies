<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 9/7/2018
 * Time: 7:35 AM
 */

namespace Framework;


abstract class Middleware
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function __invoke()
    {

    }
}