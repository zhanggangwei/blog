<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8">
    <title>Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url('static/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <script src="<?php echo base_url('static/js/jquery_1.8.3.js'); ?>"></script>
    

  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php echo site_url(); ?>">我的博客</a>
          <div class="nav-collapse collapse">
            <?php if (!$this->session->user_name) { ?>
               <form class="navbar-form pull-right" action="<?php echo site_url('User/login'); ?>" method="post">
                <span style="color:#fff;">邮箱：</span><input class="span2" type="text" name="username" value="" placeholder="请输入Email登录" id="user">
                <span style="color:#fff;">密码：</span><input class="span2" type="password" name="password" placeholder="请输入密码" value="" id="password">
                <span></span>
                <input type="submit" class="btn" value="登录">
                <!-- <a href="<?php echo site_url('user/lostPassword'); ?>">忘记密码</a> -->
                <a href="<?php echo site_url('main/login'); ?>"><input type="button" class="btn" value="注册"></a>
              </form>
            <?php }else{ ?>
            <div style="float:right">
            <span  style="color:#fff;">用户:<a style="color:#fff;" href="<?php echo site_url("user_center/index"); ?>"><?php echo $this->session->user_name; ?></a>, 你好！</span>
              <a href="<?php echo site_url("user_center"); ?>">
                <?php if ($this->session->user_name) {
                   echo '<input type="button" class="btn" value="进入个人中心">';
                } ?>
               </a>
              <a href="<?php echo site_url("user/logout"); ?>"><?php if ($this->session->user_name) {
              echo '<input type="button" class="btn" value="退出">';
             
              } ?></a>
              
              </div>
              <?php } ?>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
    	<ul class="nav nav-pills">
      <li class="active">
        <a href="<?php echo site_url(); ?>">首页</a>
      </li>
      <li><a href="<?php echo site_url('main/about'); ?>">关于我们</a></li>
      <li><a href="<?php echo site_url('main/contact'); ?>">联系我们</a></li>
    </ul>