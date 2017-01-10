

      <div class="row-fluid">
        
        <div class="span9">
          <!-- <ul class="breadcrumb">
            <li><a href="#">首页</a> <span class="divider">/</span></li>
            <li><a href="#">Library</a> <span class="divider">/</span></li>
            <li class="active">Data</li>
          </ul> -->
          <div class="page-header">
            <h1><?php echo $oneBlog['blog_title']; ?></h1>
          </div>
          <p>
          <?php echo $oneBlog['blog_content']; ?>
          </p>
          <hr />
          <h3>评论</h3>
          <?php foreach($info as $key =>$value){ ?>
          <div class="media">
            <a class="pull-left" href="#">
              <img class="media-object" data-src="holder.js/64x64">
            </a>
            <div class="media-body">
              <h4 class="media-heading"> FROM: <?php echo $value['reply_email']; ?></h4>
           
              <!-- Nested media object -->
              <div class="media">
                <?php echo $value['reply_content']; ?>
              </div>
            </div>
          </div>
          <?php } ?>
          
          <hr />
          <form class="form-horizontal" action="<?php echo site_url("main/reply")."/".$oneBlog['blog_id']; ?>" method="post">
            <fieldset>
                <legend>我要评论：</legend>
                <div class="control-group">
                  <label for="postEmail">Email</label>
                  <input type="text" id="postEmail" value="请输入Email" name="email">
                </div>
                <div class="control-group">
                  <label for="postContent">内容</label>
                  <textarea name="content" id="postContent" rows="10"></textarea>
                </div>
                <div class="control-group">
                    <input type="submit" class="btn btn-primary" value="提交">
                </div>
            </fieldset>
          </form>
          
          <script src="<?php echo base_url('static/js/jquery_1.8.3.js'); ?>"></script>
    <script>

        $('#postEmail').focus(function(){
          // alert('登陆成功！');
          $(this).val('');
        });
        $('#postEmail').blur(function(){
          if($(this).val() == ''){
            $(this).val('请输入Email');
            $(this).css("color",'red');
          }
          });
        
    </script>

        </div><!--/span-->
      	<?php $this->load->view('aside'); ?>
      </div><!--/row-->

      <hr>

     