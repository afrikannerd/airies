<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Framework\Application;
$app = Application::getInstance();

if(!function_exists("redirect"))
{
    function redirect($path)
    {

        header("Location:".$path);
        exit();

    }
}

if(!function_exists("h"))
{
    function h($str)
    {
        return htmlspecialchars($str);
    }
}

if(!function_exists("assets"))
{
    function assets($file)
    {
        global $app;
        return $app->path->assets($file);
    }
}

function media($file)
{
    global $app;
    return $app->path->media($file);
}

if(!function_exists("set"))
{
    /**useful in setting superglobals like _SESSION,_POST etc
     * @param array $container
     * @param $key
     * @param $value
     * @return mixed
     */
    function set($container,$key,$value)
    {
        return $container[$key] = $value;
    }
}

function student_nav()
{
    echo <<<NAV
    <div class="student-panel">
        <div class="h2">Student Portal</div>
        
        <div class=" logout-banner">
            
            <form class="logout-form " method="post" action="/auth/logout">
                <button type="submit" name="logout">Logout</button>
            </form>
            
        </div>
    </div>
NAV;
}

function student_sidebar()
{
    echo <<<NAV
    <div class="col col-md-2 list-group student-sidebar">
        <a href="/student" class="list-group-item" >Home</a>
        <a href="/student/results" class="list-group-item" >Exam Results</a>
        <a href="/student/fees" class="list-group-item" >Fee History</a>
    </div>
NAV;
}

function teacher_nav()
{
    echo <<<NAV
    <div class="student-panel">
        <div class="h2">Teacher Dashboard</div>
        
        <div class=" logout-banner">
            
            <form class="logout-form " method="post" action="/auth/logout">
                <button type="submit" name="logout">Logout</button>
            </form>
            
        </div>
    </div>
NAV;
}

function teacher_sidebar()
{
    echo <<<NAV
    <div class="col col-md-2 list-group student-sidebar">
        <a href="/teacher" class="list-group-item" >Home</a>
        <a href="/teacher/exam" class="list-group-item" >Exam </a>
        <a href="/teacher/subject" class="list-group-item" >Subjects</a>
    </div>
NAV;
}

function dnd($arg)
{
    echo '<pre>';
    var_dump($arg);
    echo '</pre>';
    die;
}