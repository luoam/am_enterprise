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
 <title><?=$site['name']?> | 删除文章</title>
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
          <h3 class="page-header">删除文章</h3>
          </div>
          <div class="col-xs-12">
            <article class="page-container">
                    <form class="form form-horizontal" id="form-article-edit" onsubmit="return article_del_save()">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">文章标题：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?=$article_info['title']?>" placeholder="" id="title" name="title">
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="category">分类栏目：</label>
                                    <div class="col-sm-10">
                                            <select id="category" name="category" class="form-control select2" style="width: 100%;">
                                            <?php foreach ($category_list as $category):?>	
                                                <option value="<?=$category['id']?>" <?=$category['id']===$article_info['category']?'selected="selected"':'';?>><?=$category['categoryname']?></option>
                                            <?php endforeach;?>
                                            </select>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="keywords">关键词：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?=$article_info['keywords']?>" placeholder="" id="keywords" name="keywords">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="degest">文章摘要：</label>
                                    <div class="col-sm-10">
                                        <textarea id="degest" name="degest" cols="" rows="" class="form-control"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！"><?=$article_info['degest']?></textarea>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="author">文章作者：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?=$article_info['author']?>" placeholder="" id="author" name="author">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="editor">编辑：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?=$article_info['editor']?>" placeholder="" id="editor" name="editor">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="source">文章来源：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?=$article_info['source']?>" placeholder="" id="source" name="source">
                                    </div>
                            </div>

                            <div class="form-group">
                                    <label class="col-sm-2 control-label">文章内容：</label>
                                    <div class="col-sm-10"> 
                                            <script id="data" name="data" type="text/plain" style="width:100%;height:400px;"><?=$article_info['data']?></script> 
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
function article_del_save()
    {
      var datastring ='';
        datastring = {
            'id':<?=$id?>,
            'dataline':<?=time()?>,
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
        type:"POST",
        url:"<?=$site_url?>/admin_article/del_save",
        data:datastring,
        dataType:"json",
        success:function(sdata){
          alert(sdata.errmsg);
          if (sdata.data === "1") {        
            parent.location.reload();
          }
        }
        });  
        return false;
      }
  
</script>
</body>
</html>

