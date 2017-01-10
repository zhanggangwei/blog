
  
    <div class="content">
        <div class="header">
            <h1 class="page-title">用户列表</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url('admin/blog'); ?>">Home</a> <span class="divider">/</span></li>
            <li class="active">List</li>
        </ul>
        <!-- 主体开始 -->
        <div class="container-fluid">
            <div class="row-fluid">
                    
              <div class="btn-toolbar">
                  <!-- <button class="btn btn-primary" onClick="location='<?php echo site_url('admin/reply/add'); ?>'"><i class="icon-plus"></i>回复内容</button> -->
                <div class="btn-group"></div>
              </div>
              <div class="well">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>用户ID</th>
                        <th>邮箱</th>
                        <th>用户名</th>
                        <th>注册时间</th>
                        <th style="width: 26px;"></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($info as $value){ ?>
                      <tr>
                        <td><?php echo $value['user_id']; ?></td>
                        <td><?php echo $value['user_email']; ?></td>
                        <td><?php echo $value['user_name']; ?></td>
                        <td><?php echo date("Y-m-d H:i",$value['user_logintime']); ?></td>
                        <td>
                           
                        </td>
                      </tr>
                      <?php } ?>
                      
                    </tbody>
                  </table>
              </div>
              <div class="pagination">
                  <?php echo $page_link; ?>
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
    





