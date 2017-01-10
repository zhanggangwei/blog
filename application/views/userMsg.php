
      <div class="row-fluid">
        
        <div class="span9">
          <div class="hero-unit">
            <h1>我的信息</h1>
            <form action="<?php echo site_url('user/userAlter'); ?>" method="post">
	            <p>昵称：<input type="text" name="user_name" value="<?php echo $user_name; ?>"></p>
	            <p>Email：<input type="text" name="user_email" value="<?php echo $user_email; ?>"></p>
	            <p>注册时间：<?php echo date('Y-m-d h:i:s',$user_logintime); ?></p>
	            <p><input type="submit" class="btn btn-primary" value="修改信息"></p>
            </form>
          </div>
         
        </div><!--/span-->
		<?php foreach ($info as $key => $value) { ?>
        <div class="span9">
          <div class="hero-unit">
            <h1>我的blog</h1>
            <p><?php echo $value['userblog_content']; ?></p>
          </div>
        </div><!--/span-->
		<?php } ?>
      </div><!--/row-->

      <hr>

  