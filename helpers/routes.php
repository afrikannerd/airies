<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/29/2018
 * Time: 3:29 PM
 */
if(!defined("ROOT"))
{
    return header("Location: /404");
    exit();
}
use Framework\Application;

$app = Application::getInstance();

$authenticatables = [
    '/admin',
    '/teacher',
    '/student',

    ];

foreach ($authenticatables as $authenticatable){

    if(stripos($app->request->url(),$authenticatable) === 0)
    {

        $app->route->addPriorCalls(function ($app)
        {
            $app->load->action('Route','index');
        });

    }
}
/*=================================================================================================================
 * ADMIN ROUTES
 * ================================================================================================================
 */

$app->route->add("/","Admin/Home");
$app->route->add("/admin","Admin/Home@admin");
$app->route->add("/login/admin","Admin/Home@login");
$app->route->add("/login/admin","Admin/Home@login","POST");
$app->route->add("/logout/admin","Logout","POST");
$app->route->add("/admin/students","Admin/Student",'POST');
$app->route->add("/admin/students","Admin/Student");
$app->route->add("/admin/teachers","Admin/Teacher");
$app->route->add("/add/student","Admin/Student@submit",'POST');
$app->route->add("/admin/fees","Admin/Fee");
$app->route->add("/admin/exams","Admin/Exam");
$app->route->add("/admin/viewstudent","Admin/Student@view");
$app->route->add("/admin/removestudent","Admin/Student@remove");
$app->route->add("/admin/viewstudent","Admin/Student@view","POST");
$app->route->add("/admin/removestudent","Admin/Student@remove","POST");

$app->route->add("/admin/:id/edit","Admin/Student@edit");
$app->route->add("/admin/:id/delete","Admin/Student@remove","POST");
$app->route->add("/admin/:id","Admin/Student@profile");
$app->route->add("/update/student","Admin/Student@update","POST");

/*=================================================================================================================
 * TEACHER ROUTES
 * ================================================================================================================
 */
$app->route->add("/login/teacher","Teachers/Access@login");
$app->route->add("/login/teacher","Teachers/Access@login",'POST');
$app->route->add("/teacher","Teachers/Home");
$app->route->add("/logout/teacher","Logout","POST");
$app->route->add("/teacher/exam","Teachers/Home@exam");
$app->route->add("/teacher/subject","Teachers/Home@subject");


/*=================================================================================================================
 * STUDENT ROUTES
 * ================================================================================================================
 */

$app->route->add("/login/student","Students/Home@login");
$app->route->add("/login/student","Students/Home@login",'POST');
$app->route->add('/login/submit',"","POST");
$app->route->add("/logout/student","Logout","POST");
$app->route->add("/student","Students/Home");
$app->route->add("/student/fees","Students/Home@fee");
$app->route->add("/student/results","Students/Home@result");
$app->route->add("/student/report","Students/Home@report");



/*=================================================================================================================
 * 404 NOT FOUND
 * ================================================================================================================
 */

$app->route->error404("/404");
$app->route->add("/404","HttpError");