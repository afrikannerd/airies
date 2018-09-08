<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/29/2018
 * Time: 3:29 PM
 */
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
$app->route->add("/admin","Admin/Home");
$app->route->add("/login/admin","Admin/Home@login");
$app->route->add("/dashboard","Admin/Dashboard");

/*=================================================================================================================
 * TEACHER ROUTES
 * ================================================================================================================
 */

$app->route->add("/teacher","Teachers/Home");
$app->route->add("/teacher/exam","Teachers/Home@exam");
$app->route->add("/teacher/subject","Teachers/Home@subject");
$app->route->add("/login/teacher","Teachers/Access@login");

/*=================================================================================================================
 * STUDENT ROUTES
 * ================================================================================================================
 */

$app->route->add("/login/student","Students/Home@login");
$app->route->add('/login/submit',"","POST");
$app->route->add("/student","Students/Home");
$app->route->add("/student/fee","Students/Home@render");
$app->route->add("/student/results","Students/Home@render");



/*=================================================================================================================
 * 404 NOT FOUND
 * ================================================================================================================
 */

$app->route->error404("/404");
$app->route->add("/404","HttpError");