<?php
    header('Content-type:text/plain,charset=utf-8');
    session_start();
    @$uname = $_REQUEST['uname'] or die('uname');
    @$upwd = $_REQUEST['upwd'] or die('upwd');
    
    require('init.php');

    $sql = "SELECT id FROM t_login WHERE uname = '$uname' and upwd = '$upwd'";
    $result = mysqli_query($conn,$sql);
   
    $row = mysqli_fetch_assoc($result);
    if($row){
        $_SESSION['uname'] = $uname;
        $_SESSION['upwd'] = $upwd;
        $_SESSION['loginstate'] = 1;
        echo $row['id'];
    }else{
        //用户帐号密码不匹配
        $_SESSION['loginstate'] = 0;
        echo -1;
    }
?>