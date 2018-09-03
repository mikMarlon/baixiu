<?php 

  //查出所有轮播图的数据
  require_once "admin/api/tools/doSql.php";

  $sql = "select value from options where id = 10";

  $data = my_Select($sql);

  //$data[0]['value']; 此时这个东西就是我们取出来的轮播图JSON字符串，不能直接用
  //把它转成PHP里的数据类型才能用
  //它有参数2，参数2给true代表转成关联型数组，给false代表转成对象类型，默认是false
  $sliderList = json_decode($data[0]['value'],true);

  // var_dump($sliderList);

  // PHP中的对象类型，不能通过点语法和中括号的方式来访问属性
  // echo $sliderList[0]['image'];
  // echo $sliderList[0]->image;


  //查出5篇最新的文章
  $sql = "select *from posts where status='published' order by id desc limit 5";
  $postsList = my_Select($sql);


  //查随机5篇文章
  $sql = "select id,title,views,feature from posts order by rand() limit 5";
  $randList = my_Select($sql);


  //查三篇最新发布文章要包含内容、发布者、分类等
  $sql = "select p.id,p.title,u.nickname,c.name,p.created,p.content,p.views,p.likes,p.feature from posts p
  inner join categories c
  on p.category_id = c.id
  inner join users u
  on p.user_id = u.id
  where p.status='published'
  order by p.id desc
  limit 3";

  $top3Post = my_Select($sql);


  //查出所有分类
  $sql = "select *from categories";
  $cateList = my_Select($sql);
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>阿里百秀-发现生活，发现美!</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.css">

  <style>
    .swipe-wrapper li{

      height:273px;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="topnav">
      <ul>
        <li><a href="javascript:;"><i class="fa fa-glass"></i>奇趣事</a></li>
        <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
        <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
        <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li>
      </ul>
    </div>
    <div class="header">
      <h1 class="logo"><a href="index.html"><img src="assets/img/logo.png" alt=""></a></h1>
      <ul class="nav">
      
      <?php foreach($cateList as $value): ?>
        <li><a href="list.php?name=<?php echo $value['name']; ?>&cateId=<?php echo $value['id']; ?>"><i class="fa fa-glass"></i><?php echo $value['name']; ?></a></li>
  <?php endforeach; ?>

      </ul>
      <div class="search">
        <form>
          <input type="text" class="keys" placeholder="输入关键字">
          <input type="submit" class="btn" value="搜索">
        </form>
      </div>
      <div class="slink">
        <a href="javascript:;">链接01</a> | <a href="javascript:;">链接02</a>
      </div>
    </div>
    <div class="aside">
      <div class="widgets">
        <h4>搜索</h4>
        <div class="body search">
          <form>
            <input type="text" class="keys" placeholder="输入关键字">
            <input type="submit" class="btn" value="搜索">
          </form>
        </div>
      </div>
      <div class="widgets">
        <h4>随机推荐</h4>
        <ul class="body random">
          <li>
            <a href="detail.php?id=<?php echo $randList[0]['id']; ?>">
              <p class="title"><?php echo $randList[0]['title']; ?></p>
              <p class="reading">阅读(<?php echo $randList[0]['views']; ?>)</p>
              <div class="pic">
                <img src="<?php echo $randList[0]['feature']; ?>" alt="">
              </div>
            </a>
          </li>
          <li>
          <a href="detail.php?id=<?php echo $randList[1]['id']; ?>">
              <p class="title"><?php echo $randList[1]['title']; ?></p>
              <p class="reading">阅读(<?php echo $randList[1]['views']; ?>)</p>
              <div class="pic">
                <img src="<?php echo $randList[1]['feature']; ?>" alt="">
              </div>
            </a>
          </li>
          <li>
          <a href="detail.php?id=<?php echo $randList[2]['id']; ?>">
              <p class="title"><?php echo $randList[2]['title']; ?></p>
              <p class="reading">阅读(<?php echo $randList[2]['views']; ?>)</p>
              <div class="pic">
                <img src="<?php echo $randList[2]['feature']; ?>" alt="">
              </div>
            </a>
          </li>
          <li>
          <a href="detail.php?id=<?php echo $randList[3]['id']; ?>">
              <p class="title"><?php echo $randList[3]['title']; ?></p>
              <p class="reading">阅读(<?php echo $randList[3]['views']; ?>)</p>
              <div class="pic">
                <img src="<?php echo $randList[3]['feature']; ?>" alt="">
              </div>
            </a>
          </li>
          <li>
          <a href="detail.php?id=<?php echo $randList[4]['id']; ?>">
              <p class="title"><?php echo $randList[4]['title']; ?></p>
              <p class="reading">阅读(<?php echo $randList[4]['views']; ?>)</p>
              <div class="pic">
                <img src="<?php echo $randList[4]['feature']; ?>" alt="">
              </div>
            </a>
          </li>
        </ul>
      </div>
      <div class="widgets">
        <h4>最新评论</h4>
        <ul class="body discuz">
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_2.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_2.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="content">
      <div class="swipe">
        <ul class="swipe-wrapper">
      
      <!-- 轮播图数据有多少个，就渲染多少个这样的li标签 -->
      <?php foreach($sliderList as $value):  ?>

          <li>
            <a href="<?php echo $value['link']; ?>">
              <img src="<?php echo $value['image']; ?>">
              <span><?php echo $value['text']; ?></span>
            </a>
          </li>

      <?php endforeach; ?>

        </ul>
        <p class="cursor">

<?php for($i = 0; $i < count($sliderList); $i++):  ?>

  <?php if($i == 0): ?>
          <span class="active"></span>
  <?php else: ?>
          <span></span>
  <?php endif; ?>

<?php endfor; ?>

        </p>
        <a href="javascript:;" class="arrow prev"><i class="fa fa-chevron-left"></i></a>
        <a href="javascript:;" class="arrow next"><i class="fa fa-chevron-right"></i></a>
      </div>
      <div class="panel focus">
        <h3>焦点关注</h3>
        <ul>
          <li class="large">
            <a href="detail.php?id=<?php echo $postsList[0]['id']; ?>">
              <img src="<?php echo $postsList[0]['feature']; ?>" alt="">
              <span><?php echo $postsList[0]['title']; ?></span>
            </a>
          </li>
          <li>
          <a href="detail.php?id=<?php echo $postsList[1]['id']; ?>">
            <img src="<?php echo $postsList[1]['feature']; ?>" alt="">
              <span><?php echo $postsList[1]['title']; ?></span>
            </a>
          </li>
          <li>
          <a href="detail.php?id=<?php echo $postsList[2]['id']; ?>">
            <img src="<?php echo $postsList[2]['feature']; ?>" alt="">
              <span><?php echo $postsList[2]['title']; ?></span>
            </a>
          </li>
          <li>
          <a href="detail.php?id=<?php echo $postsList[3]['id']; ?>">
            <img src="<?php echo $postsList[3]['feature']; ?>" alt="">
              <span><?php echo $postsList[3]['title']; ?></span>
            </a>
          </li>
          <li>
          <a href="detail.php?id=<?php echo $postsList[4]['id']; ?>">
            <img src="<?php echo $postsList[4]['feature']; ?>" alt="">
              <span><?php echo $postsList[4]['title']; ?></span>
            </a>
          </li>
        </ul>
      </div>
      <div class="panel top">
        <h3>一周热门排行</h3>
        <ol>
          <li>
            <i>1</i>
            <a href="javascript:;">你敢骑吗？全球第一辆全功能3D打印摩托车亮相</a>
            <a href="javascript:;" class="like">赞(964)</a>
            <span>阅读 (18206)</span>
          </li>
          <li>
            <i>2</i>
            <a href="javascript:;">又现酒窝夹笔盖新技能 城里人是不让人活了！</a>
            <a href="javascript:;" class="like">赞(964)</a>
            <span class="">阅读 (18206)</span>
          </li>
          <li>
            <i>3</i>
            <a href="javascript:;">实在太邪恶！照亮妹纸绝对领域与私处</a>
            <a href="javascript:;" class="like">赞(964)</a>
            <span>阅读 (18206)</span>
          </li>
          <li>
            <i>4</i>
            <a href="javascript:;">没有任何防护措施的摄影师在水下拍到了这些画面</a>
            <a href="javascript:;" class="like">赞(964)</a>
            <span>阅读 (18206)</span>
          </li>
          <li>
            <i>5</i>
            <a href="javascript:;">废灯泡的14种玩法 妹子见了都会心动</a>
            <a href="javascript:;" class="like">赞(964)</a>
            <span>阅读 (18206)</span>
          </li>
        </ol>
      </div>
      <div class="panel hots">
        <h3>热门推荐</h3>
        <ul>
          <li>
            <a href="detail.php?id=<?php echo $postsList[0]['id']; ?>">
              <img src="<?php echo $postsList[0]['feature']; ?>" alt="">
              <span><?php echo $postsList[0]['title']; ?></span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_3.jpg" alt="">
              <span>你敢骑吗？全球第一辆全功能3D打印摩托车亮相</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_4.jpg" alt="">
              <span>又现酒窝夹笔盖新技能 城里人是不让人活了！</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_5.jpg" alt="">
              <span>实在太邪恶！照亮妹纸绝对领域与私处</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="panel new">
        <h3>最新发布</h3>
        <div class="entry">
          <div class="head">
            <span class="sort"><?php echo $top3Post[0]['name']; ?></span>
            <a href="detail.php?id=<?php echo $top3Post[0]['id']; ?>"><?php echo $top3Post[0]['title']; ?></a>
          </div>
          <div class="main">
            <p class="info"><?php echo $top3Post[0]['nickname']; ?> 发表于 <?php echo $top3Post[0]['created']; ?></p>
            <p class="brief"><?php echo $top3Post[0]['content']; ?></p>
            <p class="extra">
              <span class="reading">阅读(<?php echo $top3Post[0]['views']; ?>)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(<?php echo $top3Post[0]['likes']; ?>)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span><?php echo $top3Post[0]['name']; ?></span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="<?php echo $top3Post[0]['feature']; ?>" alt="">
            </a>
          </div>
        </div>
        <div class="entry">
          <div class="head">
            <span class="sort">会生活</span>
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div>
        <div class="entry">
          <div class="head">
            <span class="sort">会生活</span>
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>
  <script src="assets/vendors/jquery/jquery.min.js"></script>
  <script src="assets/vendors/swipe/swipe.js"></script>
  <script>
    //
    var swiper = Swipe(document.querySelector('.swipe'), {
      auto: 3000,
      transitionEnd: function (index) {
        // index++;

        $('.cursor span').eq(index).addClass('active').siblings('.active').removeClass('active');
      }
    });

    // 上/下一张
    $('.swipe .arrow').on('click', function () {
      var _this = $(this);

      if(_this.is('.prev')) {
        swiper.prev();
      } else if(_this.is('.next')) {
        swiper.next();
      }
    })
  </script>
</body>
</html>
