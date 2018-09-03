<?php
    //获取页码
    $pageIndex = $_GET['pageIndex'];
    //获取页容量
    $pageSize = $_GET['pageSize'];

    /*
        假设页容量为 10   一页显示10条

        第1页： 从下标0开始 ，一共查10条
               limit 0,10          （1-1） * 10 = 0

        第2页： 从下标10开始。一共查10条 
               limit 10,10          （2-1） * 10 = 10

        第3页： 从下标20开始 一共查10条
               limit 20,10     （3-1） * 10 = 20

        左边那个起点等于  （页码 - 1 ） * 页容量
  
    */

    $start = ($pageIndex - 1) * $pageSize;

    //准备sql语句
    $sql = "select c.id,c.author,c.content,p.title,c.created,c.status from comments c 
            inner join posts p
            on
            c.post_id = p.id
            where c.status != 'trashed'
            limit $start,$pageSize";

    //导入工具文件
    require_once "tools/doSql.php";

    //查询sql语句
    //这是查出来的分页数据
    $data = my_Select($sql);


    //准备一条查评论总数的sql
    $sql = "select *from comments where status != 'trashed'";
    //得到评论总数
    $count = count(my_Select($sql));
    //总数 / 页容量 再向上取整就得到总页数
    $totalPage = ceil( $count / $pageSize );

    //既要返回总页数又要返回分页数据
    $obj = [
        "totalPage" => $totalPage,
        "data" => $data
    ];

    //把结果转换成json字符串
    echo json_encode($obj);
?>