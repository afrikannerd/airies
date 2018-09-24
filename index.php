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
/*$app->db->data('naem',"Ushuru")->data('pass',1000)->insert('test');
$app->db->_reset();
$app->db->data('naem',"Taifa")->data('pass',1234)->where('id=?',9)->update('test');

die;*/
$app->boot();

