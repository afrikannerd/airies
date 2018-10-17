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
        <a href="/student/report" class="list-group-item" >Report Card</a>
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

if(!function_exists('page_links'))
{
    /**
     *
     * @param int $prev
     * @param int $next
     * @param int $recordcount total number of fetchable records in current database table
     *
     */
    function page_links($current,$prev,$next,$recordcount)
    {
        $page = "<ul class='pagination'>";

        if($prev)
        {
            $page .= "<li><a href=''><img src='".media('back.png')."'></a></li>";
        }

        if($next)
        {
            $page .= "<li><a href=''><img src='".media('next.png')."'></a></li>";
        }
        $page .= "</ul>";

        return $page;
    }
}

if(!function_exists('results'))
{
    function results($mid,$end)
    {
        return new class($mid,$end)
        {
            public $mean;

            public $grade;

            public $points;
            private $mid;
            private $end;

            public function __construct(int $mid,int $end)
            {
                $this->mid = (int)$mid;
                $this->end = (int)$end;
                $this->calcmean();
                $this->points();
            }

            public function calcmean()
            {
                $this->mean = ceil(($this->mid + $this->end)/2);

            }

            public function points()
            {
                if($this->mean < 30)
                {
                    $this->grade = 'E';
                    $this->points = 1;
                }elseif ($this->mean >= 30 && $this->mean < 35)
                {
                    $this->grade = 'D-';
                    $this->points = 2;
                }elseif ($this->mean >= 35 && $this->mean < 40)
                {
                    $this->grade = 'D';
                    $this->points = 3;
                }elseif ($this->mean >= 40 && $this->mean < 45)
                {
                    $this->grade = 'D+';
                    $this->points = 4;
                }elseif ($this->mean >= 45 && $this->mean < 50)
                {
                    $this->grade = 'C-';
                    $this->points = 5;
                }elseif ($this->mean >= 50 && $this->mean < 55)
                {
                    $this->grade = 'C';
                    $this->points = 6;
                }elseif ($this->mean >= 55 && $this->mean < 60)
                {
                    $this->grade = 'C+';
                    $this->points = 7;
                }elseif ($this->mean >= 60 && $this->mean < 65)
                {
                    $this->grade = 'B-';
                    $this->points = 8;
                }elseif ($this->mean >= 65 && $this->mean < 70)
                {
                    $this->grade = 'B';
                    $this->points = 9;
                }elseif ($this->mean >= 70 && $this->mean < 75)
                {
                    $this->grade = 'B+';
                    $this->points = 10;
                }elseif ($this->mean >= 75 && $this->mean < 80)
                {
                    $this->grade = 'A-';
                    $this->points = 11;
                }else{
                    $this->grade = 'A';
                    $this->points = 12;
                }
            }

            public function point():int
            {
                return $this->points;
            }

            public function grade():string
            {
                return $this->grade;
            }

            public function mean()
            {return $this->mean;}
            /**
             * 0 - 29 E
             * 30 - 34 D-
             * 35 - 39 D
             * 40 - 44 D+
             * 45 - 49 C-
             * 50 - 54 C
             * 55 - 59 C+
             * 60 - 64 B-
             * 65 - 69 B
             * 70 - 74 B+
             * 75 - 79 A-
             * 80 - 100 A
             */
        };
    }
}









