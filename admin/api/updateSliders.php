<?php 

    //拿到数据
    $list = $_POST['list'];

    //导入文件
    require_once "tools/doSql.php";

    $sql = "update options set value='$list' where id = 10";

    $res = my_ZSG($sql);

    if($res){

        echo 'ok';
    }else{
        echo 'fail';
    }
?>