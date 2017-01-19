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

 <title><?=$site['name']?> | <?=$user_site['name']?>服务设置</title>
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
          <h3 class="page-header">服务设置</h3>
          </div>
          <div class="col-xs-12">
            <article class="page-container">
                    <form class="form form-horizontal" id="form-article-add">
                            <div class="form-group">
                                    <label class="col-sm-2 control-label">服务内容：</label>
                                    <div class="col-sm-10"> 
                                            <script id="service" name="service" type="text/plain" style="width:100%;height:400px;"><?=$service['service']?></script> 
                                    </div>
                            </div>
                            <div class="form-group">
                                    <div class="col-xs-offset-4 col-sm-offset-2">
                                            <button onClick="return service_update();" class="btn btn-primary" type="submit">提交</button>
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

<!-- 配置文件 -->
<script type="text/javascript" src="<?=$base_url?>ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="<?=$base_url?>ueditor/ueditor.all.js"></script>
<!-- SlimScroll -->
<script src="<?=$base_url?>static/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=$base_url?>static/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=$base_url?>static/adminlte/js/app.min.js"></script>
<script type="text/javascript">
$(function(){
        var ue = UE.getEditor('service');	
});
function service_update()
    {
      var datastring ='';
      var service = UE.getEditor('service').getContent();
        datastring ={
            'service':service,
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
        type:"POST",
        url:"<?=$site_url?>/user_service/service_update",
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

