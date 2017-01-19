<?php

/* 
 * Author : luoanman
 * Blog : http://www.luoanman.com
 * Email : 609892502@qq.com
 */
?>
<?php
include_once '_header.php';
$active = 'comment';
?>
 <title><?=$site['name']?> | 删除评论</title>
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
          <h3 class="page-header">删除评论</h3>
          </div>
          <div class="col-xs-12">
            <article class="page-container">
                    <form class="form form-horizontal" id="form-comment-edit"  onsubmit="return comment_del()">
                            <div class="form-group">
                                <label for="author_name" class="col-sm-2 control-label">名称：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?=$comment['author_name']?>" placeholder="" id="author_name" name="author_name">
                                    </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="author_email">邮箱：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?=$comment['author_email']?>" placeholder="" id="author_email" name="author_email">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="author_url">网址：</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?=$comment['author_url']?>" placeholder="" id="author_url" name="author_url">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="author">评论：</label>
                                    <div class="col-sm-10">
                                            <textarea name="message" id="message" cols="" rows="" class="form-control"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true"><?=$comment['message']?></textarea>
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
function comment_del()
    {
      var datastring ='';
      var id = <?=$comment['id']?>;
        datastring = {
            'id':id,
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
        type:"POST",
        url:"<?=$site_url?>/admin_comment/del_save",
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

