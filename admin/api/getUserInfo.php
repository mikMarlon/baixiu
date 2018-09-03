<?php 

    //开启session
    session_start();

    //取出session里的数据
    $userInfo = $_SESSION['userInfo'];

    //转为json字符串
    echo json_encode($userInfo);
?>