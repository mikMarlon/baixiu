<?php   

    // 作用：引入文件的内容
    //跟include的区别：include引入的文件如果有错，后面的代码依然会被执行，但是require报错之后后面代码不执行
    //once：只导入一次，可以防止重复导入出现的问题
    require_once "tools/doSql.php";

    //2. 操作数据库
    $sql = "select *from posts where status !='trashed'";

    //直接对结果数组取长度，因为我们要的就只是长度
    $postsCount = count(my_Select($sql));


    //准备找出草稿的SQL语句
    $sql = "select *from posts where status = 'drafted'";
    $draftedCount = count(my_Select($sql));
    
    //找出所有分类
    $sql = "select *from categories";
    $categoryCount = count(my_Select($sql));

    //找出所有的评论
    $sql = "select *from comments where status != 'trashed' ";
    $commentsCount = count(my_Select($sql));


    //找出所有待审核的评论
    $sql = "select *from comments where status = 'held'";
    $heldCount = count(my_Select($sql));


    //把结果返回
    $arr = [

        "postsCount" => $postsCount,
        "draftedCount" => $draftedCount,
        "categoryCount" => $categoryCount,
        "commentsCount" => $commentsCount,
        "heldCount" => $heldCount
    ];

    echo json_encode($arr);
?>