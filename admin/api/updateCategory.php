<?php 

    //拿到提交的数据
    $id = $_POST['id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];

    //导入工具文件
    require_once "tools/doSql.php";

    $sql = "update categories set name='$name',slug='$slug' where id='$id'";

    $res = my_ZSG($sql);

    if($res){

        echo 'ok';
    }else{

        echo 'fail';
    }
?>