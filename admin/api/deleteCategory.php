<?php 

    $ids = $_POST['ids'];

    require_once "tools/doSql.php";

    $sql = "delete from categories where id in($ids)";

    $res = my_ZSG($sql);

    if($res){

        echo 'ok';

    }else{
        
        echo 'fail';
    }
?>