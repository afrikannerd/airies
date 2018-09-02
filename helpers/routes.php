<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/29/2018
 * Time: 3:29 PM
 */
use Framework\Application;

$app = Application::getInstance();

if(strpos($app->request->url(),"/admin") === 0)
{

    $app->route->addPriorCalls(function ($app)
    {
        $app->load->action('Admin/Home','submit');
    });

}

$app->route->add("/","Admin/Home");
$app->route->add("/admin/user","Admin/Home@two");
$app->route->add("/admin","Admin/Home");
$app->route->add("/test","Students/Dashboard");
$app->route->add("/test/result","Students/Dashboard@result");

$app->route->add("/404","HttpError");
$app->route->error404("/404");

                     /*================*/
#########################Admin Routes###########################
                     /*================*/
$app->route->add("/dashboard","Admin/Dashboard");

$app->route->add("/teacher","Teachers/Home");
$app->route->add("/teacher/exam","Teachers/Home@exam");
$app->route->add("/teacher/subject","Teachers/Home@subject");