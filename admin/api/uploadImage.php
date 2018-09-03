<?php 

    //取到图片信息
    $image = $_FILES['image'];
    //取到图片名
    $name = $image['name'];
    //取到临时目录
    $tmp = $image['tmp_name'];
    //转成GBK名字
    $gbkName = iconv('utf-8','gbk',$name);
    //准备路径
    $path = "../../uploads/$gbkName";
    //移动图片
    move_uploaded_file($tmp,$path);

    //给网页用的，网页支持
    echo "/uploads/$name";

?>