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

if(!function_exists('sess_message'))
{
    function sess_message()
    {
        global $app;
        $message = "";
        $message_type = $app->session->exists('success')?$app->session->pop('success'):var_dump($app->session->pop('error'));
        $alert_type = $app->session->exists('success')?"alert-success alert-dismissable":"alert-danger alert-dismissable";
        if($app->session->exists('success') || $app->session->exists('error'))
        {

           $message .=" <div class=\"alert {$alert_type} \">";

            $message .= $message_type;

            $message .= "</div>";

        }
        return $message;

    }
}
function student_nav()
{
    echo <<<NAV
    <div class="student-panel">
        <div class="h2">Student Portal</div>
        
        <div class=" logout-banner">
            
            <form class="logout-form " method="post" action="/logout/student">
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
    global $app;
    $user = $app->session->get('username');
    echo <<<NAV
    <div class="student-panel">
        <div class="h2">Teacher Dashboard</div>
        
        <div class=" logout-banner">
            
            <form class="logout-form " method="post" action="/logout/teacher">
                <button type="submit" name="logout">Logout<small>($user)</small></button>
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

function navigation(){

    echo <<<NAV
<nav class="navbar navbar-default navbar-fixed-top custom-navbar">
    <div class="container-fluid">
        <div class="">
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control custom-search" placeholder="Search">
                </div>
                
            </form>
        </div>
        
        <div class=" logout-banner">
            
            <form class="logout-form " method="post" action="/logout/admin">
                <button type="submit" name="logout">Logout</button>
            </form>
            
        </div>
    </div>
    
</nav>
NAV;
}

function sidebar(){
    echo <<<EOT
<div class=" col-md-2 custom-sidebar">
    <ul class="list-group">
        <a href="/admin" class="list-group-item">Home</a>
        <a href="/admin/students" class="list-group-item">Students</a>
        <a href="/admin/teachers" class="list-group-item">Teachers</a>
        <a href="/admin/fees" class="list-group-item">Fees</a>
        <a href="/admin/exams" class="list-group-item">Exams</a>
    </ul>
</div>
EOT;
}

function dnd($arg)
{
    echo '<pre>';
    var_dump($arg);
    echo '</pre>';
    die();
}