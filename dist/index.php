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
    <div class="movie-body" id="show-body">
        <?php include('showbody.php'); ?>
    </div>
    <div class="show-movie" id="show-movie">
        <div class="one col-xs-offset-2 col-xs-2">

        </div>
    </div>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script>
        $(function(){
            $('.carousel').carousel({
                interval: 2000
            });
        });
    </script>
    <script type="text/javascript">
        $('.btn-signin').click(function() {
            $('.signin-wrapper').fadeIn();
        });
        $('.signin-wrapper').click(function(e) {
            if (e.target == this) {
                $(this).fadeOut();
            }
        });

        $('form#signin #btn_submit').click(function () {
            var param = {
                action: 'login',
                email: $('form#signin #email').val(),
                password: $('form#signin #password').val()
            };

            if (!param.email) {
                alert('请输入邮箱');
                return false;
            }
            if (!param.password) {
                alert('请输入密码');
                return false;
            }

            $.post('./server.php', param, function(data) {
                console.log(data);
                var res = JSON.parse(data);
                if (res.status == 0) {
                    location.href = "index.php";
                } else {
                    alert(res.msg);
                }
            });

            return false;
        });
        $('.btn-logout').click(function () {
            var param = {
                action: 'logout'
            };

            $.post('./server.php', param, function(data) {
                var res = JSON.parse(data);
                if (res.status == 0) {
                    location.href = "index.php";
                } else {
                    alert(res.msg);
                }
            });

            return false;
        });

        $('form#search #btn_search').click(function() {
            var keyword = $('form#search #search_name').val();

            location.href= "info.php?wd=" + keyword;
        });
    </script>
</body>
</html>



