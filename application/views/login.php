
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>注册</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url('static/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//cdnjs.bootcss.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
    <![endif]-->

     </head>

  <body>

    <div class="container">
      
      <form class="form-signin" action="<?php echo site_url('main/login'); ?>" method="post">
        <h2 class="form-signin-heading">请注册</h2>
        <input type="text" name="username" class="input-block-level" value="username" id="username">
        <input type="text" name="user_email" class="input-block-level" value="Email" id="user_email">
        <input type="password" name="password" class="input-block-level" value="" id="password">
        <label class="checkbox">
          <!-- <input type="checkbox" value="remember-me"> 记住登录信息 -->
        </label>
        <input class="btn btn-large btn-primary" type="submit" value="提交">
      </form>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('static/js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('static/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('static/js/jquery_1.8.3.js'); ?>"></script>
    <script>
        $('#username').focus(function(){
          // alert('登陆成功！');
          $(this).val('');
        });
        $('#user_email').focus(function(){
          $(this).val('');
        });
        $('#password').focus(function(){
          $(this).val('');
        });

    </script>
  </body>
</html>
