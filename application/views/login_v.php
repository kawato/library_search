<!DOCTYPE html>
<html lang="ja"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Sign in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url('css/bootstrap.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>" />
    <style type="text/css">
      body {
        padding-top: 10px;
        padding-bottom: 10px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 9px 19px 19px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="<?php echo base_url('css/bootstrap-responsive.css'); ?>" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url('js/html5shiv.js'); ?>"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('img/logo.png'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('img/logo.png'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('img/logo.png'); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('img/logo.png'); ?>">
    <link rel="shortcut icon" href="<?php echo base_url('img/logo.png'); ?>">
    <script type="text/javascript">
    <!--

    // -->
    </script>
  </head>

  <body>
    <div class="container">
      <div style="text-align: center;" class="error-message"><?php echo validation_errors(); ?></div>
      <?php echo form_open(base_url('login'), array('class' => 'form-signin')); ?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="input-block-level" placeholder="UserID" name="userid" value="<?php echo $userid;?>">
        <input type="password" class="input-block-level" placeholder="Password" name="password" value="<?php echo $password;?>">
        <button id="signin" name="singin" class="btn btn-large btn-primary" type="submit">Sign in</button>
      <?php echo form_close(); ?>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('js/jquery-1.9.0.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.js'); ?>"></script>

</body></html>