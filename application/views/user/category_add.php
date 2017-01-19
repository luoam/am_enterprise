<?php

/* 
 * Author : luoanman
 * Blog : http://www.luoanman.com
 * Email : 609892502@qq.com
 */
?>
<?php
include_once '_header.php';
$active = 'category';
?>
<!-- Select2 -->
<link rel="stylesheet" href="<?=$base_url?>static/plugins/select2/select2.min.css">
 <title><?=$site['name']?> | 添加栏目</title>
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
    <!-- Content Header (Page header) -->
<!--    <section class="content-header">

    </section>-->

    <!-- Main content -->
    <section class="invoice no-margin">

      <!-- Default row -->
      <div class="row">
          <div class="col-xs-12">
          <h3 class="page-header">添加栏目</h3>
          </div>
          <div class="col-xs-12">
            <article class="page-container">
                    <form class="form form-horizontal" id="form-article-add" onsubmit="return category_save()">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="category">上级栏目：</label>
                                    <div class="col-sm-10">
                                            <select id="upcategory" name="upcategory" class="form-control select2" style="width: 100%;">
                                            <option value="0">顶级分类</option>
                                            <?php foreach ($category_up as $category):?>
                                            <option value="<?=$category['id']?>"><?=$category['categoryname']?></option>
                                            <?php endforeach;?>
                                            </select>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="categoryname">分类名称：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="" placeholder="" id="categoryname" name="categoryname">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="keywords">关键字：</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="" placeholder="" id="keywords" name="keywords">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="description">描述：</label>
                                    <div class="col-sm-10">
                                            <textarea name="description" id="description" cols="" rows="" class="form-control"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！"></textarea>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="editor">是否内容栏目：</label>
                                    <div class="col-sm-10">
                                            <input type="checkbox" id="checkbox">
                                            <label for="checkbox-pinglun">&nbsp;</label>
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
});
function category_save()
    {
      var datastring ='';
      var upcategory = $("#upcategory").val();
      var categoryname = $("#categoryname").val();
      var description = $("#description").val();
      var keywords = $("#keywords").val();
      var flag = '0';
      if($("input[type='checkbox']").is(':checked'))
      {
          flag = '1';
      }
      if(categoryname==='')
      {
          alert('请填写栏目名称');          
      }else
      {
//        datastring = datastring + 'categoryname=' + categoryname + '&upcategory=' + upcategory + '&description=' + description + '&keywords=' + keywords + '&flag=' + flag;
        datastring = {
            'categoryname':categoryname,
            'upcategory':upcategory,
            'description':description,
            'keywords':keywords,
            'flag':flag,
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
        type:"POST",
        url:"<?=$site_url?>/admin_category/add_save",
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

