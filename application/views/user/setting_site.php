<?php

/* 
 * Author : luoanman
 * Blog : http://www.luoanman.com
 * Email : 609892502@qq.com
 */
?>
<?php
include_once '_header.php';
$active = 'site';
?>
 <title><?=$site['name']?> | <?=$user_site['name']?>网站设置</title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php
  include_once '_nav.php';
?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
<?php
      include_once '_left.php';
?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="invoice no-margin">

      <!-- Default row -->
      <div class="row">
          <div class="col-xs-12">
          <h3 class="page-header">网站设置</h3>
          </div>
          <div class="col-xs-12">
            <article class="page-container">
                    <form class="form form-horizontal" id="form-site" onsubmit="return site_save()">

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">网站名称：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?=$user_site['name']?>" placeholder="" id="name" name="name">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="keywords">关键词：</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?=$user_site['keywords']?>" placeholder="" id="keywords" name="keywords">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="description">描述：</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" id="description" cols="" rows="" class="form-control"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true"><?=$user_site['description']?></textarea>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <div class="col-xs-offset-4 col-sm-offset-2">
                                            <button class="btn btn-primary" type="submit">提交</button>
                                    </div>
                            </div>
                    </form>
            </article>
          </div>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->
<?php
include_once '_footer.php';
?>
<!-- SlimScroll -->
<script src="<?=$base_url?>static/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=$base_url?>static/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=$base_url?>static/adminlte/js/app.min.js"></script>
<script type="text/javascript">
function site_save()
    {
      var datastring ='';
      var name = $("#name").val();
      var keywords = $("#keywords").val();
      var description = $("#description").val();
      datastring = {
          'name':name,
          'keywords':keywords,
          'description':description,
          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
      };
      $.ajax({
        type:"POST",
        url:"<?=$site_url?>/user_site/site_update",
        data:datastring,
        dataType:"json",
        success:function(sdata){
          alert(sdata.errmsg);
          if (sdata.data === "1") {        
            location.reload();
          }
        }
      });  

      return false;
    }       
</script>
</body>
</html>

