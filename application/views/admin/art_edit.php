
    <div class="content">
        <div class="header">
            <h1 class="page-title">发布文章</h1>
        </div>
                <ul class="breadcrumb">
            <li><a href="<?php echo site_url('admin/blog'); ?>">Home</a> <span class="divider">/</span></li>
            <li class="active">发布文章</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary" onClick="location='<?php echo site_url('admin/article/art_list'); ?>'"><i class="icon-list"></i> 文章列表</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
        <form action="" method="post">
            <label>文章分类</label>
            <select name="cate" class="input-xlarge">
              <?php foreach($cate as $value){ ?>
                <option <?php if($value['category_id']==$info['category_id']){echo "selected";} ?> value="<?php echo $value['category_id']; ?>"><?php echo $value['category_name']; ?></option>
              <?php } ?>
              <!-- <option value="">新闻</option>
              <option value="">新闻</option> -->
            </select>
            <label>文章标题</label>
            <input type="text" value="<?php echo $info['blog_title']; ?>" name="title" class="input-xxlarge">
            <label>文章内容</label>
            <textarea value="Smith" rows="3" name="content" class="input-xxlarge"><?php echo $info['blog_content']; ?></textarea>
            <label></label>
            <input type="hidden" name="id" value="<?php echo $info['blog_id']; ?>">
            <input class="btn btn-primary" type="submit" value="提交" />
        </form>
      </div>
  </div>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
  </div>
</div>


                    
                    <footer>
                        <hr>
                        <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
                        <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                        

                        <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>
    

