<?php

/* 
 * Author : luoanman
 * Blog : http://www.luoanman.com
 * Email : 609892502@qq.com
 */
?>
<?php
include_once '_header.php';
$active = 'article';
?>
<!-- Select2 -->
<link rel="stylesheet" href="<?=$base_url?>static/plugins/select2/select2.min.css">
 <title><?=$site['name']?> | 添加文章</title>
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
                                                <option value="<?=$category['id']?>"><?=$category['categoryname']?></option>
                                            <?php endforeach;?>
                                            </select>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="keywords">关键词：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="" placeholder="" id="keywords" name="keywords">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="degest">文章摘要：</label>
                                    <div class="col-sm-10">
                                        <textarea id="degest" name="degest" cols="" rows="" class="form-control"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！"></textarea>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="author">文章作者：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="安满小站" placeholder="" id="author" name="author">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="editor">编辑：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="安满小站" placeholder="" id="editor" name="editor">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="source">文章来源：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="安满小站" placeholder="" id="source" name="source">
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
                                            <button onClick="return article_add_save();" class="btn btn-primary" type="submit">提交</button>
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
function article_add_save()
    {
      var datastring ='';
      var title = $("#title").val();
      var category = $("#category").val();
      var degest = $("#degest").val();
      var keywords = $("#keywords").val();
      var author = $("#author").val();
      var editor = $("#editor").val();
      var source = $("#source").val();
      var dataline = <?=time()?>;
      var pagedelete = '0';
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
            'degest':degest,
            'keywords':keywords,
            'author':author,
            'editor':editor,
            'source':source,
            'dataline':dataline,
            'pagedelete':pagedelete,
            'data':data,
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
        type:"POST",
        url:"<?=$site_url?>/admin_article/add_save",
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

