<?php

date_default_timezone_set("Africa/Nairobi");

include_once 'Framework/Application.php';
include_once 'Framework/Path.php';
use Framework\{
    Application,
    Path
};

define("ROOT",__DIR__);
define("TITLE","Sunshine School");

$app = Application::getInstance(new Path(ROOT));

$app->boot();

