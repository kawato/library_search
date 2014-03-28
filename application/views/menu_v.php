<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <button type="button" class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="brand" href="#">Library</a>
      <div class="nav-collapse collapse" style="height: 0px;">
        <ul class="nav">
          <li class="<?php echo $menu_active == 'search' ? 'active':'';?>"><a href="<?php echo base_url('search');?>">書籍検索</a></li>
        </ul>
        <?php echo form_open(base_url('login'), array('class' => 'navbar-form pull-right')); ?>
          <span style="color:white;">ログイン中：<?php echo $login_id; ?>さん</span>
          <button type="submit" class="btn">Logout</button>
        <?php echo form_close(); ?>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>