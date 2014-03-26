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
        <form class="navbar-form pull-right" action="<?php echo base_url('login');?>">
          <span style="color:white;">ログイン中：<?php echo $login_id; ?>さん</span>
          <button type="submit" class="btn">Logout</button>
        </form>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>