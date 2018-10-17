<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 8/30/2018
 * Time: 10:00 AM
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $this->title;?></title>


<link href="<?=assets('css/bootstrap.min.css');?>" rel="stylesheet" type="text/css"/>
<link href="<?=assets('css/app.css');?>" rel="stylesheet" type="text/css"/>
<link href="<?=assets('css/admin.css');?>" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="container-fluid main">
    <?php
    if($this->app->session->exists('username'))
    {
        navigation();
        sidebar();

    }
    $this->app->session->add('referer',"http://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
    ?>
    <?php include_once $this->path; ?>

</div>
<footer class="layout-footer" >
    <div class="footer text-center"  >
        Designed and maintained by <a href="https://www.zalegoinstitute.ac.ke/home" target="_blank">Zalego Institute</a>
        <span> Copyright &copy; 2017&nbsp;&nbsp;-&nbsp;&nbsp;<?= date('Y')?></span>
    </div>
</footer>

<script src="<?=assets('js/jquery-1.12.3.min.js');?>"> </script>
<script src="<?=assets('js/bootstrap.min.js');?>" type="text/javascript"></script>
<script src="<?=assets('js/app.js');?>" type="text/javascript"></script>
</body>
</html>
