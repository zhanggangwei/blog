
  
    <div class="content">
        <div class="header">
            <h1 class="page-title">文章列表</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url('admin/blog'); ?>">Home</a> <span class="divider">/</span></li>
            <li class="active">List</li>
        </ul>
        <!-- 主体开始 -->
        <div class="container-fluid">
            <div class="row-fluid">
                    
              <div class="btn-toolbar">
                  <button class="btn btn-primary" onClick="location='<?php echo site_url('admin/article/add'); ?>'"><i class="icon-plus"></i>发布文章</button>
                <div class="btn-group"></div>
              </div>
              <div class="well">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>文章标题</th>
                        <th>发布时间</th>
                        <th style="width: 26px;"></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($info as $value){ ?>
                      <tr>
                        <td><?php echo $value['blog_id']; ?></td>
                        <td><?php echo $value['blog_title']; ?></td>
                        <td><?php echo date("Y-m-d H:i",$value['blog_time']); ?></td>
                        <td>
                            <a href="<?php echo site_url('admin/article/edit/'.$value['blog_id']); ?>"><i class="icon-pencil"></i></a>
                            <a href="<?php echo site_url('admin/article/delete/'.$value['blog_id']); ?>" onclick="return confirm('确定要删除吗？')" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
                        </td>
                      </tr>
                      <?php } ?>
                      <!-- <tr>
                        <td>1</td>
                        <td>必须使用HTML5文档类型 Bootstrap使用的某些HTML元素</td>
                        <td>2013-06-21</td>
                        <td>
                            <a href="user.html"><i class="icon-pencil"></i></a>
                            <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>必须使用HTML5文档类型 Bootstrap使用的某些HTML元素</td>
                        <td>2013-06-21</td>
                        <td>
                            <a href="user.html"><i class="icon-pencil"></i></a>
                            <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>必须使用HTML5文档类型 Bootstrap使用的某些HTML元素</td>
                        <td>2013-06-21</td>
                        <td>
                            <a href="user.html"><i class="icon-pencil"></i></a>
                            <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>必须使用HTML5文档类型 Bootstrap使用的某些HTML元素</td>
                        <td>2013-06-21</td>
                        <td>
                            <a href="user.html"><i class="icon-pencil"></i></a>
                            <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>必须使用HTML5文档类型 Bootstrap使用的某些HTML元素</td>
                        <td>2013-06-21</td>
                        <td>
                            <a href="user.html"><i class="icon-pencil"></i></a>
                            <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
                        </td>
                      </tr> -->
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
    





