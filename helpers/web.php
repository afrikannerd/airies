<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 9/9/2018
 * Time: 4:45 PM
 */
if(!defined("ROOT"))
{
    return exit("page does not exist");

}
return [
    /**
     * admin defined route container
     */
    'admin' => [
        "/admin",
        "/dashboard",
    ],

    'teacher' => [
        "/teacher",
        "/teacher/exam",
        "/teacher/subject",
    ],

    'student' => [
        "/student",
        "/student/fee",
        "/student/results",
    ],

];