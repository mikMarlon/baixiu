<?php 

    //直接导入工具文件
    require_once "tools/doSql.php";

    //构建Sql
    $sql = "select value from options where id = 10";

    //哪怕只找到一行数据，那么也是一个二维数组
    $data = my_Select($sql);

    //因为我们查到的value的值直接就是JSON字符串格式，就不用转换
    //取到唯一那一行，再取到value这一列对应的内容
    echo $data[0]['value'];
?>