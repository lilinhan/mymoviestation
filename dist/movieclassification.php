<?php
//链接数据库
session_start();
if (isset($_GET["class"])) {
    $class = $_GET["class"];
    $flag = 1;
}else if( isset($_GET["area"])) {
    $area = $_GET["area"];
    $flag = 2;
}else if( isset($_GET["year"])) {
    $year = $_GET["year"];
    $flag = 3;
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
<div class="classification-movie"$sql = "SELECT movie_about.*,movie_data.* FROM `movie_about`,`movie_data` WHERE movie_about.classfication LIKE \'%战争%\' AND movie_about.id = movie_data.id ">
    <?php
    $connection = connectMySQL();
    $number = $page * 30;
    $sql = "SELECT movie_about.*,movie_uri.jpg FROM movie_about,movie_uri where movie_about.id = movie_uri.id ORDER BY id asc limit {$number},30";
    //echo $sql;$sql = "SELECT movie_about.*,movie_data.* FROM `movie_about`,`movie_data` WHERE movie_about.classfication LIKE \'%战争%\' AND movie_about.id = movie_data.id "
    $result = selectMySQL($sql);
    $i = 0;
    while($row = mysql_fetch_array($result)) {
        // var_dump($row);
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

            <p><a class="btn btn-default" href="info.php?id=<?php echo $row['id']?>" role="button">查看详情 &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <?php
        if ($i % 6 == 5) {
            echo '</div>';
        }
        $i++;
    }

    ?>

    <nav>
        <ul class="pager"  style="width:200px; position: absolute; right: 20px;">
            <li class="previous"><a href="./index.php?page=<?php echo ($page-1)?>"><span aria-hidden="true">&larr;</span> Older</a></li>
            <li class="next"><a href="./index.php?page=<?php echo ($page+1)?>">Newer <span aria-hidden="true">&rarr;</span></a></li>
        </ul>
    </nav>
</div>
</div>

</body>
</html>