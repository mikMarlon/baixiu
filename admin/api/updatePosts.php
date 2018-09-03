<?php 

    //拿到所有提交的数据
    $title = $_POST['title'];
    $content = $_POST['content'];
    $slug  = $_POST['slug'];
    $category_id = $_POST['category'];
    $created = $_POST['created'];
    $status = $_POST['status'];
    $id = $_POST['id'];
    
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
    
     //转回UTF-8的路径
     $path = "../../uploads/$name";
     
     //如果name为空就代表没有改过图片，那么就不要更新feature字段
     if($name == '')
        $sql = "update posts set slug='$slug',title='$title',created='$created',content='$content',status='$status',category_id='$category_id' where id = $id";
     else
        $sql = "update posts set slug='$slug',title='$title',feature='$path',created='$created',content='$content',status='$status',category_id='$category_id' where id = $id";

     //执行sql
     $result = my_ZSG($sql);
    
     if($result){

        echo 'ok';
     }else{

        echo 'fail';
     }
?>