
      <div class="row-fluid">
        
        <div class="span9">
          <div class="hero-unit">
            <h1>欢迎来到博客网</h1>
            <p>这是一个个人博客，里面有很多分享的经验。</p>
            <p><a href="<?php echo site_url('main/study'); ?>" class="btn btn-primary btn-large">马上去学习 &raquo;</a></p>
          </div>
          <?php foreach($info as $key =>$value){ ?>
          <div class="row-fluid">
            <h2><?php echo $value['blog_title']; ?></h2>
              <p><?php echo character_limiter($value['blog_content'],10); ?></p>
              <p><a class="btn" href="<?php echo site_url('main/detail/'.$value['blog_id']); ?>">阅读更多 &raquo;</a></p>
          </div>
          <?php } ?>
       
			<div class="pagination pagination-centered">
			  <?php echo $page_link; ?>
			</div>
        </div><!--/span-->
      	<?php $this->load->view('aside'); ?>
      </div><!--/row-->

      <hr>

  