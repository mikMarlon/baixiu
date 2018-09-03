<?php   

    //导入工具文件
    require_once "tools/doSql.php";

    //直接查询就行了
    $sql = "select *from categories";
    $data = my_Select($sql);

    //返回就完了
    echo json_encode($data);
?>