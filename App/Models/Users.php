<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/25/2018
 * Time: 3:01 PM
 */

namespace App\Models;



use Framework\Model;

class Users extends Model
{
    protected $table = "students";

    private $user = null;


    function index()
    {
        return $this->where('admno = ?',7733)
                    ->from('students')
                    ->fetch();
    }

    function submit()
    {

    }

    function user()
    {

    }

    function authenticated():bool
    {
        return true;
    }

    function setTable($table)
    {
        $this->table = $table;
    }
}