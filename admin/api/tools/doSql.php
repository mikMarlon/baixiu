<?php 

    function my_Select($sql){

        //1. 连接数据库
        $link = mysqli_connect('127.0.0.1','root','root','baixiu');

        //2. 操作数据库
        $result = mysqli_query($link,$sql);

        //直接对结果数组取长度，因为我们要的就只是长度
        //转换成数组
        $data = mysqli_fetch_all($result,1);
        
        mysqli_close($link);

        //把结果返回
        return $data;
    }


    function my_ZSG($sql){

        //能来到这证明旧密码验证成功，只要去操作数据库就可以了
        $link = mysqli_connect('127.0.0.1','root','root','baixiu');
        
        //执行
        $result = mysqli_query($link,$sql);
        
        mysqli_close($link);
        
        return $result;
    }

?>