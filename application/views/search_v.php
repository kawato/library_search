<!DOCTYPE html>
<html lang="ja"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>書籍検索</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url('css/bootstrap.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/superTables.css'); ?>">
    <script src="<?php echo base_url('js/jquery-1.9.0.js'); ?>"></script>
    <script src="<?php echo base_url('js/jquery.form.js'); ?>"></script>
    <script src="<?php echo base_url('js/superTables.js'); ?>"></script>
    <style type="text/css">
      body {
        /* padding-top: 10px; */
        padding-bottom: 10px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 900px;
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

      .achievements-wrapper { height: 420px; overflow: auto; }
      td,th {
        white-space: nowrap;
      }
      #search_result th {
        border-radius:0;
      }
      #search_result td {
        border-radius:0;
      }

    </style>
    <!-- <link href="<?php echo base_url('css/bootstrap-responsive.css'); ?>" rel="stylesheet"> -->

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
    jQuery(function ($) {
      <?php if ($is_searched && count($result) > 0): ?>
        new superTable("search_result", {
          cssSkin : "sDefault",
          fixedCols : 1
          });
        $('#pagination').find('a').click(function(e) {
          // hrefの制御をキャンセル
          e.preventDefault();
          // フォーム先を指定
          $('#frm_search').attr('action', e.target.href);
          // Submit
          $('#frm_search').submit();
        });
      <?php endif; ?>
    });
    // -->
    </script>
  </head>

  <body>
    <?php echo $menu; ?>
    <div style="margin-top: 50px;"></div>
    <div class="container">
      <div class="form-signin">
        <h4 class="form-signin-heading">検索条件</h4>
        <?php echo form_open(base_url('search'), array('id' => 'frm_search')); ?>
          <div style="text-align: center;" class="error-message"><?php echo validation_errors(); ?></div>
          <table class="table" style="border: 0px;">
            <thead>
            </thead>
            <tbody>
              <tr>
                <td style="vertical-align: middle;">カテゴリ</td>
                <td style="vertical-align: middle;" >
                  <select name="category_id" class="input-block-level">
                    <option value="">選択してください</option>
                    <?php foreach ($category as $key => $v): ?>
                      <option value="<?php echo $key; ?>" <?php echo $key == $category_id ? 'selected':''; ?>><?php echo $v; ?></option>
                    <?php endforeach; ?>
                  </select>
                </td>
                <td style="vertical-align: middle;">著者</td>
                <td style="vertical-align: middle;">
                  <input type="text" name="publisher_name" style="margin-bottom: 0px;" value="<?php echo $publisher_name; ?>" />
                </td>
              </tr>
              <tr>
                <td style="vertical-align: middle;">書籍名</td>
                <td style="vertical-align: middle;">
                  <input type="text" name="book_name" style="margin-bottom: 0px;" value="<?php echo $book_name; ?>" />
                </td>
                <td style="vertical-align: middle;">書籍ID</td>
                <td style="vertical-align: middle;" >
                  <input type="text" name="book_id" style="margin-bottom: 0px;" value="<?php echo $book_id; ?>" />
                </td>
              </tr>
            <tr>
              <td style="vertical-align: middle;">発行年月日</td>
              <td style="vertical-align: middle;" colspan="3">
                <select name="begin_publication_date_year" style="width:90px;">
                  <option value="">--</option>
                  <?php foreach ($year as $v): ?>
                    <option value="<?php echo $v; ?>" <?php echo $begin_publication_date_year == $v ? 'selected':''; ?>><?php echo $v; ?></option>
                  <?php endforeach; ?>
                </select>&nbsp;年
                <select name="begin_publication_date_month" style="width:60px;">
                  <option value="">--</option>
                  <?php foreach ($month as $v): ?>
                    <option value="<?php echo $v; ?>" <?php echo $begin_publication_date_month == $v ? 'selected':''; ?>><?php echo sprintf('%02d',$v); ?></option>
                  <?php endforeach; ?>
                </select>&nbsp;月
                <select name="begin_publication_date_day" style="width:60px;">
                  <option value="">--</option>
                  <?php foreach ($day as $v): ?>
                    <option value="<?php echo $v; ?>" <?php echo $begin_publication_date_day == $v ? 'selected':''; ?>><?php echo sprintf('%02d',$v); ?></option>
                  <?php endforeach; ?>
                </select>&nbsp;日
                &nbsp;&nbsp;～&nbsp;&nbsp;
                <select name="end_publication_date_year" style="width:90px;">
                  <option value="">--</option>
                  <?php foreach ($year as $v): ?>
                    <option value="<?php echo $v; ?>" <?php echo $end_publication_date_year == $v ? 'selected':''; ?>><?php echo $v; ?></option>
                  <?php endforeach; ?>
                </select>&nbsp;年
                <select name="end_publication_date_month" style="width:60px;">
                  <option value="">--</option>
                  <?php foreach ($month as $v): ?>
                    <option value="<?php echo $v; ?>" <?php echo $end_publication_date_month == $v ? 'selected':''; ?>><?php echo sprintf('%02d',$v); ?></option>
                  <?php endforeach; ?>
                </select>&nbsp;月
                <select name="end_publication_date_day" style="width:60px;">
                  <option value="">--</option>
                  <?php foreach ($day as $v): ?>
                    <option value="<?php echo $v; ?>" <?php echo $end_publication_date_day == $v ? 'selected':''; ?>><?php echo sprintf('%02d',$v); ?></option>
                  <?php endforeach; ?>
                </select>&nbsp;日
              </td>
              </tr>
            </tbody>
          </table>
          <div style="text-align: center;"><button id="btn_search"  type="submit" class="btn btn-primary"><i class="icon-search icon-white" style="margin-top: 1px;"></i>&nbsp;Search</button></div>
        <?php echo form_close(); ?>

      </div>
      <?php if ($is_searched): ?>
      <?php if (count($result) > 0): ?>
      <div class="form-signin" style="margin-top: 10px;">
        <h4 class="form-signin-heading">検索結果</h4>
        <?php echo $page_link; ?>
        <div class="achievements-wrapper">
        <table class="table table-bordered table-striped" id="search_result">
          <thead>
            <tr>
              <th>項番</th>
              <th>書籍ID</th>
              <th>カテゴリー名</th>
              <th>出版社名</th>
              <th>書籍名</th>
              <th>著者名</th>
              <th>詳細</th>
              <th>価格</th>
              <th>発行年月日</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;foreach ($result as $v): ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $v->book_id; ?></td>
              <td><?php echo $v->category_name; ?></td>
              <td><?php echo $v->publisher_name; ?></td>
              <td><?php echo $v->title ?></td>
              <td><?php echo $v->author_name; ?></td>
              <td><?php echo $v->detail; ?></td>
              <td style="text-align:right;"><?php echo number_format($v->price); ?></td>
              <td><?php echo $v->publication_date; ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        </div>
        <?php echo $page_link; ?>
        <?php echo form_open(base_url('search/csv'), array('id' => 'frm_csv','style' => 'margin-top: 10px;')); ?>
          <input type="hidden" name="category_id" value="<?php echo $category_id; ?>" />
          <input type="hidden" name="publisher_name" value="<?php echo $publisher_name; ?>" />
          <input type="hidden" name="book_name" value="<?php echo $book_name; ?>" />
          <input type="hidden" name="book_id" value="<?php echo $book_id; ?>" />
          <input type="hidden" name="begin_publication_date_year" value="<?php echo $begin_publication_date_year; ?>" />
          <input type="hidden" name="begin_publication_date_month" value="<?php echo $begin_publication_date_month; ?>" />
          <input type="hidden" name="begin_publication_date_day" value="<?php echo $begin_publication_date_day; ?>" />
          <input type="hidden" name="end_publication_date_year" value="<?php echo $end_publication_date_year; ?>" />
          <input type="hidden" name="end_publication_date_month" value="<?php echo $end_publication_date_month; ?>" />
          <input type="hidden" name="end_publication_date_day" value="<?php echo $end_publication_date_day; ?>" />


          <div style="text-align: center;"><button id="btn_search"  type="submit" class="btn btn-primary"><i class="icon-download icon-white" style="margin-top: 1px;"></i>&nbsp;CSV</button></div>
        <?php echo form_close(); ?>
      </div>
      <?php else: ?>
        <div class="form-signin" style="margin-top: 10px;">
        <h4 class="form-signin-heading">検索結果</h4>
          対象レコードなし
        </div>
      <?php endif; ?>
      <?php endif; ?>
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('js/bootstrap.js'); ?>"></script>

</body></html>