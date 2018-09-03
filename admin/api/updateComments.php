<?php 

    //拿到提交过来的数据
    $ids = $_POST['ids'];
    $status = $_POST['status'];


    //引入操作数据库的工具文件
    require_once "tools/doSql.php";

    //构建SQL语句
    $sql = "update comments set status='$status' where id in( $ids )";
    //执行SQL
    $result = my_ZSG($sql);

    if($result){

        echo "ok";
        
    }else{

        echo "fail";
    }
?>