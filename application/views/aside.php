<div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">分类</li>
              <?php foreach($cat_info as $key => $val){ ?>
              <li <?php if($val['category_id']==$cat_id){echo 'class="active"';} ?>><a href="<?php echo site_url().'/main/index/'.$val['category_id']; ?>"><?php echo $val['category_name']; ?></a></li>
              <?php } ?>
              <li class="nav-header">按日期</li>
              <?php foreach($year_info as $val){ ?>
              <li <?php if($val['year']==$cat_id){echo 'class="active"';} ?>><a href="<?php echo site_url().'/main/index/'.$val['year']; ?>"><?php echo $val['year']; ?>年</a></li>
              <?php } ?>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->