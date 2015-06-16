<?php
//链接数据库
session_start();
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
    <?php include('manager.php'); ?>
</div>
<div class="addmovie">
    <form class="search-movie" action="searchmovie.php" method="get">
        <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">电影名称</span>
            <input type="text" class="form-control" placeholder="电影名称" aria-describedby="sizing-addon2" name="name" >
        </div>
        <button type="addmovie-button" class="btn btn-primary">提交</button>
    </form>
</div>
<div class="show-search-movie">
    <?php
    if(isset($_GET["name"])) {
        $name = $_GET["name"];
        $sql = "SELECT * FROM movie_about where movie_about.name LIKE"."'%{$name}%'";
        $connection = connectMySQL();
        $result = selectMySQL($sql);
        while($row = mysql_fetch_array($result)){
            $id = $row['id'];
            $name =  $row['name'];
            $picture = $row['picture'];
            $classfication = $row['classfication'];
            $year = $row['year'];
            $score = $row['score'];
        }
    }
    ?>

    <table class="table">
            <tr>
                <td>名称:<?php echo $name?></td>
                <td>id:<?php echo $id?></td>
                <td>画质：<?php echo $picture?></td>
                <td>类型：<?php echo $classfication?></td>
                <td>年份：<?php echo $year?></td>
                <td>评分：<?php echo $score?></td>
            </tr>

    </table>
</div>
</body>
</html>