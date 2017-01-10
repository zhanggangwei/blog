
  
    <div class="content">
        <div class="header">
            <h1 class="page-title">blog</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url('admin/blog'); ?>">Home</a> <span class="divider">/</span></li>
            <li class="active">List</li>
        </ul>
        <!-- 主体开始 -->
        <div class="container-fluid">
            <div class="row-fluid">
              <div class="btn-toolbar">
                <div class="btn-group"></div>
              </div>
              <div class="well">
                  <form action="<?php echo site_url('user/publish'); ?>" method="post">
                      <textarea style="width:890px;" name="blogcontent" id="textarea" cols="10000" rows="15">在这里输入发布内容</textarea>
              </div>
                      <button type="submit" class="btn btn-primary">点击发布</button>
                   </form>
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
              <!-- 主体结束 -->

              <footer>
                    <hr/>
                    <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
                    <p class="pull-right">A <a href="" target="_blank">Free Bootstrap Theme</a> by <a href="" target="_blank">Portnine</a></p>
                    
                    <p>&copy; 2012 <a href="" target="_blank">Portnine</a></p>
              </footer>  
            </div>
        </div>
    </div>
    





