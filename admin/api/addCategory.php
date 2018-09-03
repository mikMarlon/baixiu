<?php 

    //拿到传递过来的数据
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    
    //引入工具
    require_once "tools/doSql.php";

    $sql = "insert into categories(slug,name) values('$slug','$name')";

    $result = my_ZSG($sql);

    if($result)
        echo 'ok';
    else
        echo 'fail';
?>