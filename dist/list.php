
<?php
//链接数据库
session_start();
include('server.php');
$page = 0;
if (isset($_GET["page"]))
    $page = $_GET["page"];
$temp = NULL;

$sql = "SELECT movie_about.*,movie_uri.jpg,movie_data.area FROM movie_about,movie_uri,movie_data where movie_about.id = movie_uri.id and movie_about.id = movie_data.id and ";
if(isset($_GET['area'])){
    //有国家和地区的get请求
    $area = $_GET['area'];
    $temp = "area=".$area;
    $sql = $sql." movie_data.area like \"%{$area}%\"";
}elseif(isset($_GET['class'])){
    //类型
    $class = $_GET['class'];
    $temp = "class=".$class;
    $sql = $sql." movie_about.classfication like \"%{$class}%\"";
}elseif(isset($_GET['year'])){
    //年份
    $year = $_GET['year'];
    $temp = "year=".$year;
    $sql = $sql." movie_about.year = \"{$year}\"";
}



/*
 *
$sql = "SELECT * FROM(SELECT movie_about.*,movie_data.area FROM movie_about inner join movie_data on movie_data.id= movie_about.id ) as A WHERE";
 * */
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

<div class="show-movie" id="show-movie">
    <?php
    $connection = connectMySQL();
    $number = $page * 30;
    $sql = $sql." limit {$number},30";
    $result = selectMySQL($sql);
    $i = 0;
    while($row = mysql_fetch_array($result)) {
        if ($i % 6 == 0) {
            echo '<div class="row">';
        }
        ?>
        <div class="col-xs-2">
            <img class="img-rounded"
                 src="<?php echo $row['jpg'] ?>"
                 alt="movie jpg" width="150" height="200">
            <h4><?php echo $row['name']; ?></h4>
            <p>画质：<?php echo $row['picture']; ?></p>
            <p>时间：<?php echo $row['year'] . "年"; ?></p>
            <p><a class="btn btn-default" href="info.php?id=<?php echo $row['id'] ?>" role="button">查看详情 &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <?php
        if ($i % 6 == 5) {
            echo '</div>';
        }
        $i++;
    }

    echo $result->num_rows;
    //if($result->num_rows > 30) {
    ?>
        <nav>
                <ul class="pager"  style="width:200px; position: absolute; right: 20px;">
                    <li class="previous <?php if($page <= 0) echo "disabled"; ?>"><a href="?<?php echo $temp;if($page > 0) echo "&page=".($page-1); ?>"><span aria-hidden="true">&larr;</span> Older</a></li>
                    <li class="next"><a href="?<?php echo $temp."&page=".($page+1)?>">Newer <span aria-hidden="true">&rarr;</span></a></li>
                </ul>
        </nav>
    <?php //} ?>

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

