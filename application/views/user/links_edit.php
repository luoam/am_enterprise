<?php

/* 
 * Author : luoanman
 * Blog : http://www.luoanman.com
 * Email : 609892502@qq.com
 */
?>
<?php
include_once '_header.php';
$active = 'links';
?>
 <title><?=$site['name']?> | 修改链接</title>
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
          <h3 class="page-header">修改链接</h3>
          </div>
          <div class="col-xs-12">
            <article class="page-container">
                    <form class="form form-horizontal" id="form-link-edit" onsubmit="return links_edit()">

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="webname">名称：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?=$links['webname']?>" placeholder="" id="webname" name="webname">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="weburl">链接：</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?=$links['weburl']?>" placeholder="" id="weburl" name="weburl">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="keywords">关键字：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?=$links['keywords']?>" placeholder="" id="keywords" name="keywords">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="description">简介：</label>
                                    <div class="col-sm-10">
                                            <textarea name="description" id="description" cols="" rows="" class="form-control"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！"><?=$links['description']?></textarea>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">联系人：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?=$links['name']?>" placeholder="" id="name" name="name">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="tel">电话：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?=$links['tel']?>" placeholder="" id="tel" name="tel">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="email">邮箱：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?=$links['email']?>" placeholder="" id="email" name="email">
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
function links_edit()
    {
      var datastring ='';
      var webname = $("#webname").val();
      var weburl = $("#weburl").val();
      var keywords = $("#keywords").val();
      var description = $("#description").val();
      var name = $("#name").val();
      var tel = $("#tel").val();
      var email = $("#email").val();
      var time = <?=time()?>;
      var id = <?=$id?>;
        datastring = {
            'webname':webname,
            'weburl':weburl,
            'keywords':keywords,
            'description':description,
            'name':name,
            'tel':tel,
            'email':email,
            'time':time,
            'id':id,
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
        type:"POST",
        url:"<?=$site_url?>/admin_links/edit_save",
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

