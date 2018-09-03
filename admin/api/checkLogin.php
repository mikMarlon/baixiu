<?php 

    //判断有没有session
    session_start();

    //如果有session代表登录成功！
    if( isset( $_SESSION['userInfo'] ) ){

        echo "loginOK";

    }else{
        //没有代表没登录或登录失败
        echo "loginError";
    }
    
?>