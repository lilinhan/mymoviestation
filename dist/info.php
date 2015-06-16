<?php
//链接数据库
session_start();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}else {
    echo '<script>location.href="./index.php";</script>';
}

include('server.php');
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

<div class="show-movieinfo col-xs-8 col-xs-offset-2">
    <?php
    $connection = connectMySQL();
    $sql = "SELECT movie_about.*,movie_uri.*,movie_data.* FROM movie_about,movie_uri,movie_data where movie_about.id ="."'{$id}'". "AND movie_uri.id ="."'{$id}'"."AND movie_data.id = "."'{$id}'";
    $result = selectMySQL($sql);
    while($row = mysql_fetch_array($result)) {
        $name =  $row['name'];
        $picture = $row['picture'];
        $classfication = $row['classfication'];
        $year = $row['year'];
        $score = $row['score'];
        $download = $row['download'];
        $jpg = $row['jpg'];
        $area = $row['area'];
        $director = $row['director'];
        $star = $row['star'];
        $summary = $row['summary'];
    }
    ?>
    <div class="show-movieinfo-contents">
        <div class="show-movie-jpg col-xs-2">
            <img class="img-rounded"
                 src="<?php echo $jpg ?>"
                 alt="movie jpg" width="150" height="200">
        </div>
        <div class="show-movie-info col-xs-10">
            <h4><?php echo $name; ?></h4>
            <p>画质：<?php echo $picture; ?></p>
            <p>时间：<?php echo $year . "年"; ?></p>
            <p>分类：<?php echo $classfication; ?></p>
            <p>地区：<?php echo $area; ?></p>
            <p>导演：<?php echo $director; ?></p>
            <p>主演：<?php echo $star; ?></p>
            <p>豆瓣评分：<?php echo $score; ?></p>
        </div>
    </div>
    <div class="show-movie-brief">
        <p>简介：</p>
        <p><?php echo $summary; ?></p>
    </div>
    <div class="show-movie-download">
        <div class="show-movie-download-info col-xs-10">
            <button class="btn btn-info disabled">下载请戳：</button>
            <a href="<?php echo $download ; ?>"><?php echo $download?></a>
        </div>
        <div class="return col-xs-2">
            <a class="btn btn-info" href="index.php">返回首页</a>
        </div>
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



