<?php

    //取到所有数据
    $slug = $_POST['slug'];
    $nickname = $_POST['nickname'];
    $bio = $_POST['bio'];


    //tmp_name就是图片上传后保存在服务器的临时目录
    //如果你不处理，系统会立即删除它（也就是让它消失）
    //当你上传图片后，要记得先把这个临时目录的文件移动到其他地方，就不会自动删除
    $avatar = $_FILES['avatar'];

    //取出文件上传后的临时目录
    $tmp = $avatar['tmp_name'];
    //取出图片自己的名字
    $name = $avatar['name'];

    //图片名字可能会包含中文，所以把图片名字改成GBK编码的名字
    $gbkName = iconv('utf-8','gbk',$name);

    //PHP中的路径不支持/这个根目录的写法， 用/就要报错
    $path = "../../uploads/$gbkName";
    //参数1：移动谁
    //参数2：移动到哪里去
    move_uploaded_file($tmp,$path);

    //要拿到id，而拿到id就可以通过session来拿
    session_start();
    $id = $_SESSION['userInfo']['id'];

    //开始修改数据库1
    $link = mysqli_connect('127.0.0.1','root','root','baixiu');

    //先把路径换回UTF-8的路径名字
    $path = "../../uploads/$name";
    
    //写sql语句

    //判断图片名是否为空，如果为空，代表用户没改过图片
    //没改过就不要更新avatar这个字段
    if($name == "")
        $sql = "update users set slug='$slug',nickname='$nickname',bio='$bio' where id='$id'";
    else
        $sql = "update users set slug='$slug',nickname='$nickname',avatar='$path',bio='$bio' where id='$id'";


    $result = mysqli_query($link,$sql);

    if($result){

        $_SESSION['userInfo']['slug'] = $slug;
        $_SESSION['userInfo']['nickname'] = $nickname;
        
        if($name != "")
            $_SESSION['userInfo']['avatar'] = $path;

        $_SESSION['userInfo']['bio'] = $bio;

        echo "ok";

    }else{

        echo "fail";
    }

    //关闭数据库
    mysqli_close($link);
    
?>