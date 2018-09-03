<?php 

    //开启session
    session_start();
    
    //清除session里保存的数据
    unset($_SESSION['userInfo']);

    //路径的问题，因为当前文件在api文件夹下
    //而login.html在上一级，所以记得../
    header('location:../login.html');
?>