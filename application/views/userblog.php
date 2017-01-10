
      <div class="row-fluid">
        <?php foreach($info as $key =>$value){ ?>
        <div class="span9">
          <div class="hero-unit">
            <h1>我的blog<?php echo $value['userblog_id']; ?></h1>
            <p><?php echo $value['userblog_content']; ?></p>
            <p><a class="btn btn-primary" href="<?php echo site_url('user/userdel/'.$value['userblog_id']) ?>">删除</a></p>
          </div>
        </div><!--/span-->
		<?php } ?>
      </div><!--/row-->

      <hr>

  