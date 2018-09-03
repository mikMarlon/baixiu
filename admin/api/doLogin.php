<?php 

    //拿到提交的数据
    $email = $_POST['email'];
    $password = $_POST['password'];


    //就要去数据库查询了
    //1. 连接数据库
    $link = mysqli_connect('127.0.0.1','root','root','baixiu');

    //2. 操作数据库
    $sql = "select *from users where email='$email' and password ='$password'";
    $result = mysqli_query($link,$sql);
    //转换成数组
    $data = mysqli_fetch_all($result,1);

    //3. 关闭数据库
    mysqli_close($link);

    //如果查出来的数据大于0，就代表能查到，就是登录成功
    if(count($data) > 0){

        echo "ok";

        //写入到session
        //开启session
        session_start();
        //把查到的登录信息写入到session
        $_SESSION['userInfo'] = $data[0];

    }else{

        echo "fail";
    }

?>