<?php 

    //获取提交的数据
    $pageIndex = $_GET['pageIndex'];
    $pageSize = $_GET['pageSize'];
    //获取分类id
    $cate_id = $_GET['cate_id'];
    //获取筛选的文章状态
    $status = $_GET['status'];


    //导入操作数据库的工具文件
    require_once "tools/doSql.php";

    //算出起点
    $start = ($pageIndex - 1) * $pageSize;

    //构建SQL语句
    $sql1 = "select p.id,p.title,u.nickname,c.name,p.created,p.status  from posts p
            inner join users u
            on p.user_id = u.id
            inner join categories c
            on p.category_id = c.id
            where p.status != 'trashed'";
    
    //如果不是所有分类，才加下面这句sql语句
    //如果是所有分类就不需要加
    if($cate_id != ""){
        //注意记得前面加空格，否则连在一起了
        $sql1 .= " and p.category_id = $cate_id";
    }

    if($status != ""){
        $sql1 .= " and p.status = '$status'";
    }
            
    //再拼接分页
    $sql1  .= " order by p.id desc limit $start,$pageSize";

    //执行
    $data = my_Select($sql1);

    //还要查出总数据，再算出总页数
    $sql2 = "select p.id,p.title,u.nickname,c.name,p.created,p.status  from posts p
             inner join users u
             on p.user_id = u.id
             inner join categories c
             on p.category_id = c.id
             where p.status != 'trashed'";

    //因为选择分类后，总页数肯定也有变化，所以也要判断
    if($cate_id != "" ){

        $sql2 .= " and p.category_id = $cate_id";
    }

    if($status != ""){

        $sql2 .= " and p.status = '$status'";
    }

    //得到总数据
    $count = count(my_Select($sql2));

    //总页数  总数据 / 页容量 向上取整
    $totalPage = ceil( $count / $pageSize );

    //返回响应体
    $obj = [
        "totalPage" => $totalPage,
        "data" => $data
    ];

    echo json_encode($obj);
?>