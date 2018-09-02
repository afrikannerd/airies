<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/30/2018
 * Time: 7:38 AM
 */

namespace Framework\Sessions;


class Session
{
    function init()
    {
        new Handler();
        if(session_status() !== PHP_SESSION_ACTIVE)
        {
            session_start();
        }
    }
    function exists($key):bool
    {
        return isset($_SESSION[h($key)]);
    }

    function add($key,$value):void
    {
        set($_SESSION,$key,$value);
    }

    function get($key)
    {
        if($this->exists($key))
        {
            return $_SESSION[$key];
        }
        return null;
    }

    function pop($messageKey)
    {

        if($this->exists($messageKey))
        {
            $message = $_SESSION[$messageKey];
            $this->delete($messageKey);
            return $message;
        }
        return false;
    }

    function delete($key)
    {
        unset($_SESSION[$key]);
    }
}