<?php 

    //拿到传递过来的id
    $id = $_GET['id'];

    //查数据
    require_once "tools/doSql.php";

    $sql = "select *from posts where id='$id'";

    //注意：查出来的是数组，只不过数组长度为1，直接取下标0就是那条数据
    $data = my_Select($sql)[0];

    //转成json字符串返回
    echo json_encode($data);

?>