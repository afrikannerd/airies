<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/30/2018
 * Time: 12:02 PM
 */

namespace Framework;

if(!defined('ROOT'))exit("Get out!");
abstract class Model
{
    protected $app;


    protected $table = '';
    
    protected $errors = [];

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function all()
    {
        return $this->fetchAll($this->table);
    }

    public function get($sql,$id)
    {
        return $this->where($sql,$id)->from($this->table)->fetch();
    }

    public function delete($sql,$id)
    {
        return $this->from($this->table)->delete($sql,$id);
    }

    public function setTable($table)
    {
        $this->table = $table;
    }

    public function error()
    {
        return $this->errors();
    }
    function __call($method, $arguments)
    {
        return call_user_func_array([$this->app->db,$method],$arguments);
    }

    function __get($key)
    {
        return $this->app->$key;
    }
}