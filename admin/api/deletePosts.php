<?php 

    //获取ids
    $ids = $_POST['ids'];

    //导入工具文件
    require_once "tools/doSql.php";

    //构建sql语句
    $sql = "update posts set status='trashed' where id in($ids)";

    $result = my_ZSG($sql);

    if($result){

        echo "ok";
    }else{
        echo "fail";
    }
?>