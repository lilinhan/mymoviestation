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
    <?php include('manager.php'); ?>
</div>
<div class="addmovie">
    <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">电影名称</span>
        <input type="text" class="form-control" placeholder="电影名称" aria-describedby="sizing-addon2">
    </div>
    <button type="addmovie-button" class="btn btn-primary">提交</button>
</div>
</body>
</html>