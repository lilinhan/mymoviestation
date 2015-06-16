<?php
//链接数据库
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>hello,Movieworld</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="./css/mycss.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">

</head>
<body>
<div class="container nav">
    <?php include('test.php'); ?>
</div>
<div class="manager">
    <ul class="nav nav-pills ">
        <li role="presentation" class="active"><a href="index.php">主页</a></li>
        <li role="presentation"><a href="addmovie.php">增加电影</a></li>
        <li role="presentation"><a href="removemovie.php">删除电影</a></li>
        <li role="presentation"><a href="searchmovie.php">查找电影</a></li>
        <li role="presentation"><a href="changepasswd.php">修改密码</a> </li>
    </ul>
</div>
</body>
</html>