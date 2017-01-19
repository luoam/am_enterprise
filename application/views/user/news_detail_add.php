<?php

/* 
 * Author : luoanman
 * Blog : http://www.luoanman.com
 * Email : 609892502@qq.com
 */
?>
<?php
include_once '_header.php';
$active = 'news';
?>
<!-- Select2 -->
<link rel="stylesheet" href="<?=$base_url?>static/plugins/select2/select2.min.css">
 <title><?=$site['name']?> | <?=$user_site['name']?>添加文章</title>
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
          <h3 class="page-header">添加文章</h3>
          </div>
          <div class="col-xs-12">
            <article class="page-container">
                    <form class="form form-horizontal" id="form-article-add">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">文章标题：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="" placeholder="" id="title" name="title">
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="category">分类栏目：</label>
                                    <div class="col-sm-10">
                                            <select id="category" name="category" class="form-control select2" style="width: 100%;">
                                            <?php foreach ($category_list as $category):?>	
                                                <option value="<?=$category['id']?>"><?=$category['name']?></option>
                                            <?php endforeach;?>
                                            </select>
                                    </div>
                            </div>


                            <div class="form-group">
                                    <label class="col-sm-2 control-label">文章内容：</label>
                                    <div class="col-sm-10"> 
                                            <script id="data" name="data" type="text/plain" style="width:100%;height:400px;"></script> 
                                    </div>
                            </div>
                            <div class="form-group">
                                    <div class="col-xs-offset-4 col-sm-offset-2">
                                            <button onClick="return news_add_save();" class="btn btn-primary" type="submit">提交</button>
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
<!-- Select2 -->
<script src="<?=$base_url?>static/plugins/select2/select2.full.min.js"></script>
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
        $(".select2").select2();
        var ue = UE.getEditor('data');	
});
function news_add_save()
    {
      var datastring ='';
      var title = $("#title").val();
      var category = $("#category").val();
      var data = UE.getEditor('data').getContent();
      if($("input[type='checkbox']").is(':checked'))
      {
          flag = '1';
      }
      if(title === '')
      {
          alert("请填写文章标题");          
      }else
      {

        datastring ={
            'title':title,
            'category':category,
            'data':data,
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
        type:"POST",
        url:"<?=$site_url?>/user_news/news_add_save",
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

