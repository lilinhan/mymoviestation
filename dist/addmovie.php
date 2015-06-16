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
    <form class="submit-addmovie" action="./doaction.php?act=addMovie" method="post">
        <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">电影名称</span>
            <input type="text" class="form-control" placeholder="电影名称" aria-describedby="sizing-addon2" name="name">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">电影画质</span>
            <input type="text" class="form-control" placeholder="电影画质" aria-describedby="sizing-addon2" name="picture">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">电影类别</span>
            <input type="text" class="form-control" placeholder="电影类别" aria-describedby="sizing-addon2" name="classfication">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">电影年份</span>
            <input type="text" class="form-control" placeholder="电影年份" aria-describedby="sizing-addon2" name="year">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">电影评分</span>
            <input type="text" class="form-control" placeholder="电影评分" aria-describedby="sizing-addon2" name="score">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">电影地区</span>
            <input type="text" class="form-control" placeholder="电影地区" aria-describedby="sizing-addon2" name="area">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">导演</span>
            <input type="text" class="form-control" placeholder="导演" aria-describedby="sizing-addon2" name="director">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">主演</span>
            <input type="text" class="form-control" placeholder="主演" aria-describedby="sizing-addon2" name="star">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">评价</span>
            <input type="text" class="form-control" placeholder="评价" aria-describedby="sizing-addon2" name="summary">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">种子地址</span>
            <input type="text" class="form-control" placeholder="种子地址" aria-describedby="sizing-addon2" name="download">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">海报地址</span>
            <input type="text" class="form-control" placeholder="海报地址" aria-describedby="sizing-addon2" name="jpg">
        </div>
        <button type="addmovie-button" class="btn btn-primary">提交</button>

    </form>
</div>
</body>
</html>