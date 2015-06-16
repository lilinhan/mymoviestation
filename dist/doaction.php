<?php
/**
 * Created by PhpStorm.
 * User: lewin
 * Date: 15-6-16
 * Time: 下午7:10
 */

require_once "server.php";
//
//var_dump($_GET);
//var_dump($_POST);

if(isset($_GET['act'])){
    $act = $_GET['act'];
}else{
    echo '<script>alert("ERROR!");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
}

//执行修改
function addMySQLData() {
    $name = $_POST['name'];
    $picture = $_POST['picture'];
    $classfication = $_POST['classfication'];
    $year = $_POST['year'];
    $score = $_POST['score'];
    $area = $_POST['area'];
    $director = $_POST['director'];
    $star =  $_POST['star'];
    $summary = $_POST['summary'];
    $download = $_POST['download'];
    $jpg = $_POST['jpg'];
    $sql = "INSERT INTO movie_about(name,picture,classfication,year,score) VALUES (\"{$name}\",\"{$picture}\",\"{$classfication}\",\"{$year}\",\"{$score}\")";
    mysql_query($sql);
    $sql = "INSERT INTO movie_data (area,director,star,summary) VALUES (\"".$area."\",\"".$director."\",\"".$star."\",\"".$summary."\")";
    mysql_query($sql);
    $sql = "INSERT INTO movie_uri(download,jpg) VALUES (\"{$download}\",\"{$jpg}\")";
    mysql_query($sql);
}

function deleteMySQLData() {
    $id = $_GET['id'];
    $sql = "DELETE FROM movie_about WHERE id =".$id;
    mysql_query($sql);
    $sql = "DELETE FROM movie_data WHERE id =".$id;
    mysql_query($sql);
    $sql = "DELETE FROM movie_uri WHERE id =".$id;
    mysql_query($sql);
}

connectMySQL();
switch($act){
    case 'addMovie':
        addMySQLData();
        echo '<script>alert("添加成功!");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
        break;
    case 'delMovie':
        $id = $_GET['id'];
        deleteMySQLData();
        echo '<script>alert("删除成功!");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
        break;
    case 'changepasswd':
        if($_POST['newpasswd1'] != $_POST['newpasswd2']) {
            echo '<script>alert("密码不一致!");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }
        $sql = "select passwd from movie_admin where mail=\"{$_GET['mail']}\"";
        $result = mysql_query($sql);
        while($row = mysql_fetch_array($result)) {
            $oldpasswd = $row['passwd'];
        }
        if ($_POST['oldpasswd'] == $oldpasswd) {
            $sql = "update movie_admin set passwd =\"{$_POST['newpasswd1']}\" WHERE mail=\"{$_GET['mail']}\"";
            $result = mysql_query($sql);
            echo '<script>alert("密码修改成功!");location.href="' . $_SERVER['HTTP_REFERER'] . '"</script>';
        }else {
            echo '<script>alert("密码不一致!");location.href="' . $_SERVER['HTTP_REFERER'] . '"</script>';
        }
        break;
}




