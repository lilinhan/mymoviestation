<?php
//链接数据库
session_start();

function connectMySQL( $db_host , $db_user ,$db_psw ) {
    $connection = mysql_connect($db_host,$db_user,$db_psw);
    if(!$connection){
        die('链接MySQL服务器失败！');
    }
    //echo '连接MySQL服务器成功！<br />';
    mysql_select_db("moviedb", $connection);
    mysql_query("set character set 'utf8'");
}
//查询
function selectMySQL( $sql ) {
    $result = mysql_query($sql);
    $res = array();
    while($row = mysql_fetch_array($result))
    {
        $res[] = $row;
    }

}
//验证密码
function makeSurePasswd( $account , $passwd ) {
    connectMySQL("localhost","root","lewin123");

    $sql = "SELECT mail, passwd FROM ".movie_admin." WHERE mail='".$account . "'";

    $result = mysql_query($sql);

    $user = mysql_fetch_assoc($result);

    $sqlmail = $user['mail'];
    $sqlpasswd = $user['passwd'];
    if($sqlmail == $account && $passwd == $sqlpasswd)
        return true;
    else
        return false;
}
//执行修改
function changeMySQLData($sql) {
    mysql_query($sql);
}

function do_login() {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $res = array();


    if (makeSurePasswd($email, $password)) {
        $_SESSION['login'] = true;
        $_SESSION['mail'] = $email;

        $res['msg'] = '登录成功！';
        $res['status'] = 0;

        echo json_encode($res);
    } else {
        $res['msg'] = '登录失败！';
        $res['status'] = -1;

        echo json_encode($res);
    }
}

function do_logout() {
    $res = array();

    if (session_destroy()) {
        $res['msg'] = '退出成功！';
        $res['status'] = 0;
    } else {
        $res['msg'] = '退出失败！';
        $res['status'] = -1;
    }
    echo json_encode($res);
}


$action = $_POST['action'];
switch($action) {
    case 'login':
        do_login();
        break;
    case 'logout':
        do_logout();
        break;
}
?>

