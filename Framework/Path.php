<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Framework;

/**
 * Description of Path
 *
 * @author nerd
 */
class Path {
    
    const DS = DIRECTORY_SEPARATOR;
    public $rootpath;
    
    public function __construct($path) {
        $this->rootpath = $path;
    }
    
    public function exists($file)
    {
        return file_exists($this->to($file));
    }
    
    public function to($file)
    {
        $file = ltrim($file, '/');
        return $this->rootpath. static::DS.str_replace(['/',"\\"], static::DS, $file).'.php';
    }
    public function toPublic($file)
    {
        return $this->to('public/'.$file);
    }

    public function toHelpers($file)
    {
        return $this->to('helpers/'.$file);
    }

    public function load($file)
    {
        return require_once $this->to($file);
    }

    function assets($file)
    {
        return "/public". static::DS.str_replace(['/',"\\"], static::DS, $file);
    }

    function media($file)
    {
        return "/public/media/".$file;
    }
}
