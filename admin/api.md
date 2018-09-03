## 判断登录是否成功的接口

url:"api/doLogin.php",
type:post
参数：
    email
    password

响应体
    ok 或者 fail


## 判断是否登录的接口

url:"api/checkLogin.php"
type:get
参数：无
响应体：
    loginOK or loginError


## 获取登录用户信息的接口
url:"api/getUserInfo.php"
type:get
参数：无
响应体：
    JSON格式字符串
        { "id":1,"slug":"admin","nickname":"管理员" };


## 获取网站数据个数信息
url:"api/getWebInfo.php",
type:"get"
参数：无
响应体：
    {postsCount:5,draftedCount:2,categoryCount:3, commentsCount:10,heldCount:1}
    postsCount：文章总数
    draftedCount：草稿总数
    categoryCount：分类总数
    commentsCount：评论总数
    heldCount：待审核评论总数


## 更新用户信息的接口
url:"api/updateUserInfo.php"
type:"post"
参数：
    avatar:头像
    slug：别名
    nickname：昵称
    bio：简介
响应体：
    OK
    fail


## 做登出（退出）的接口
url:"api/logout.php"
type:"get"
参数：无
响应体
    直接自己调回login.html
    在重定向之前清空session


## 修改密码的接口
url:"api/changePass.php",
type:"post"
参数：oldpass:旧密码
      newpass：新密码

响应体
    旧密码验证失败
    修改成功
    修改失败


## 获得所有评论的接口
url:"api/getComments.php"
type:"get"
参数：
    pageIndex： 带一个页码值过来，代表你要查第几页
    pageSize: 把页容量也带过来，能让接口更灵活

响应体：
    JSON字符串

    {

    totalPage: 40,
    data:[

        {},
        {}
    ]
    };

    totalPage 是 总页数
    data：是我们查出来的分页数据


## 操作评论的接口
url:"api/updateComments.php",
type：post
参数：
        ids:     传入要修改的数据的id集合，如果只有1个id就只传1个，如果有多个，就传 10,22,45这样的形式
        status：传入要修改的状态


## 获取文章的接口
url:"api/getPosts.php"
type:get
参数：
    pageIndex: 传入要查询的页码
    pageSize:传入要每页的页容量
    cate_id: 分类id，要么传空，要么传对应的分类id值
    status: 筛选的文章状态，要么传空，要么就是published或drafted

响应体：
    json字符串，根是对象
    {
        totalPage:总页数
        data: 真正的数据（一个数组）
    }

## 获取分类的接口
url:"api/getCategory.php",
type:get
参数：
    无

响应体：
    [
        {id:1,name:"未分类"}
        {id:1,name:"未分类"}
    ]


## 新增文章的接口
url:"api/addPosts.php",
type:post
参数：
    title:
    content:
    slug:
    feature:
    category
    created
    status

响应体：
    ok 或 fail


## 删除文章的接口
url:"api/deletePosts.php"
type:post
参数：ids:传一个id或多个id
响应体：
    ok   fail


## 根据id获取文章详情的接口
url:"api/getPostsById.php"
type:'get'
参数：id

响应体
    json字符串
    { id: title: slug... }


## 修改文章的接口
url:"api/updatePosts.php",
type:'post'
参数：
    title:
    content:
    slug:
    feature:
    category
    created
    status
    id: 传入要修改的id

响应体
    ok  fail


## 新增分类的接口
url:"api/addCategory.php"
type:post
data:
        name:
        slug
响应体
    ok fail


## 修改分类的接口
url:"api/updateCategory.php",
type:post
data:
    name
    slug
    id

响应体
    ok fail


## 删除分类的接口
url:"api/deleteCategory.php",
type:post
data:
    ids:一个或多个id
响应体
    ok fail


## 获取所有轮播图数据的接口
url:"api/getSliders.php"
type:get
参数：无
响应体：
    Json字符串
    [
       {"image":"/uploads/slide_1.jpg","text":"轮播项一","link":"https://zce.me"},{"image":"/uploads/slide_2.jpg","text":"轮播项二","link":"https://zce.me"}
    ]


## 异步上传图片并返回路径的接口
url:"api/uploadImage.php"
type:post
参数：image：对应的上传图片
响应体：
        路径


## 修改轮播图数量的接口
url:"api/updateSliders.php",
type:"post"
参数： list: json字符串(这个字符串表示一个数组)
响应体
    ok fail