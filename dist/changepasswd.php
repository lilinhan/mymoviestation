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
    <form class="delete-movie" action="doaction.php?act=changepasswd&mail=<?php echo $_SESSION['mail']; ?>" method="post">
        <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">旧密码</span>
            <input type="password" class="form-control" placeholder="旧密码" aria-describedby="sizing-addon2" name="oldpasswd">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">新密码</span>
            <input type="password" class="form-control" placeholder="新密码" aria-describedby="sizing-addon2" name="newpasswd1">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">新密码</span>
            <input type="password" class="form-control" placeholder="新密码" aria-describedby="sizing-addon2" name="newpasswd2">
        </div>
        <button type="addmovie-button" class="btn btn-primary">提交</button>
    </form>
</div>
</body>
</html>