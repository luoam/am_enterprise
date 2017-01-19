<?php

/* 
 * Author : luoanman
 * Blog : http://www.luoanman.com
 * Email : 609892502@qq.com
 */
?>
<?php
include_once '_header.php';
$active = 'user';
?>
 <title><?=$site['name']?> | <?=$user_site['name']?>修改用户</title>
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
          <h3 class="page-header">修改用户</h3>
          </div>
          <div class="col-xs-12">
            <article class="page-container">
                    <form class="form form-horizontal" id="form-user-edit" onsubmit="return user_edit_save()">

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="username">用户名：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?=$user['username']?>" placeholder="" id="username" name="username">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="password">密码：</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="" placeholder="" id="password" name="password">
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
function user_edit_save()
    {
      var datastring ='';
      var username = $("#username").val();
      var password = $("#password").val();
      if(username==='')
      {
          alert('请填写用户名');          
      }else if(password==='')
      {
          alert('密码为空表示不修改密码');
      }else
      {
        datastring = {
            'username':username,
            'password':password,
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
        type:"POST",
        url:"<?=$site_url?>/user_user/edit_save",
        data:datastring,
        dataType:"json",
        success:function(sdata){
          alert(sdata.errmsg);
          if (sdata.data === "1") {        
            location.reload();
          }
        }
        });  
      }

      return false;
    }      
</script>
</body>
</html>

