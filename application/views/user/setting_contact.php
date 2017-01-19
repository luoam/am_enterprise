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
 <title><?=$site['name']?> | <?=$user_site['name']?>联系方式设置</title>
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
          <h3 class="page-header">联系方式</h3>
          </div>
          <div class="col-xs-12">
            <article class="page-container">
                    <form class="form form-horizontal" id="form-site" onsubmit="return contact_update()">

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="address">地址：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?=$contact['address']?>" placeholder="" id="address" name="address">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="tel1">电话1：</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?=$contact['tel1']?>" placeholder="" id="tel1" name="tel1">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="tel2">电话2：</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?=$contact['tel2']?>" placeholder="" id="tel2" name="tel2">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="fax">传真：</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?=$contact['fax']?>" placeholder="" id="fax" name="fax">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="email">电邮：</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?=$contact['email']?>" placeholder="" id="email" name="email">
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
function contact_update()
    {
      var datastring ='';
      var address = $("#address").val();
      var tel1 = $("#tel1").val();
      var tel2 = $("#tel2").val();
      var fax = $("#fax").val();
      var email = $("#email").val();
      datastring = {
          'address':address,
          'tel1':tel1,
          'tel2':tel2,
          'fax':fax,
          'email':email,
          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
      };
      $.ajax({
        type:"POST",
        url:"<?=$site_url?>/user_contact/contact_update",
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

