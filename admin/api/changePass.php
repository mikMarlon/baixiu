<?php 

    //拿到数据
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];

    //跟数据库中的密码进行比较，不用去查数据库，因为$session里面已经有了
    session_start();

    if( $oldpass !=  $_SESSION['userInfo']['password'] ){

        echo "旧密码验证失败！";
        return;
    }

    //导入工具文件
    require_once "tools/doSql.php";

    //取出要修改的用户id
    $id = $_SESSION['userInfo']['id'];

    //构建sql语句
    $sql = "update users set password='$newpass' where id = '$id'";

    //执行sql，并获得结果
    $result = my_ZSG($sql);

    if($result){

        echo "修改成功";
    }else{

        echo "修改失败";
    }

?>