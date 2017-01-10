
    <div class="content">
        <div class="header">
            <h1 class="page-title">后台首页</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url('admin/blog'); ?>">Home</a> <span class="divider">/</span></li>
            <li class="active">Index</li>
        </ul>
            <h2>欢迎回来，<?php echo $_SESSION['username'];?>!</h2>
            <p>您上次登录时间是：<?php echo date("Y-m-d H:i",$res['admin_lastlogintime']);?></p>
            <p>您上次登录IP是：<?php echo $res['admin_lastloginip'];?></p>
        <div class="container-fluid">
            <div class="row-fluid">
                    <footer>
                        <hr>
                        <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
                        <p class="pull-right">A <a href="" target="_blank">Free Bootstrap Theme</a> by <a href="" target="_blank">Portnine</a></p>
                        
                        <p>&copy; 2012 <a href="" target="_blank">Portnine</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>



