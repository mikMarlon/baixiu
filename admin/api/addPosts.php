<?php 
    //拿到所有提交的数据
    $title = $_POST['title'];
    $content = $_POST['content'];
    $slug  = $_POST['slug'];
    $category_id = $_POST['category'];
    $created = $_POST['created'];
    $status = $_POST['status'];

    //要有一个user_id，就从session里面取到当前登录的用户信息
    session_start();
    $user_id = $_SESSION['userInfo']['id'];

    //取到图片信息
    $feature = $_FILES['feature'];
    //图片名
    $name = $feature['name'];

    //临时目录
    $tmp = $feature['tmp_name'];


    //准备写入到uploads文件夹，我们现在是中文windows操作系统，要转码
    $gbkName = iconv('utf-8','gbk',$name);
    //拼接路径 注意：PHP里面不支持根目录
    $path = "../../uploads/$gbkName";
    //做文件移动
    move_uploaded_file($tmp,$path);

    //导入工具文件
    require_once "tools/doSql.php";

    //转回UTF-8的图片路径
    $path = "../../uploads/$name";
    $sql = "insert into posts(slug,title,feature,created,content,status,user_id,category_id) values('$slug','$title','$path','$created','$content','$status','$user_id','$category_id')";

    //执行sql
    $result = my_ZSG($sql);
 
    if($result){

        echo "ok";
    }else{

        echo "fail";
    }
?>