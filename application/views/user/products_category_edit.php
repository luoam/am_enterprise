<?php

/* 
 * Author : luoanman
 * Blog : http://www.luoanman.com
 * Email : 609892502@qq.com
 */
?>
<?php
include_once '_header.php';
$active = 'products';
?>
<!-- Select2 -->
<link rel="stylesheet" href="<?=$base_url?>static/plugins/select2/select2.min.css">
 <title><?=$site['name']?> | <?=$user_site['name']?>修改栏目</title>
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
          <h3 class="page-header">修改栏目</h3>
          </div>
          <div class="col-xs-12">
            <article class="page-container">
                    <form class="form form-horizontal" id="form-article-add" onsubmit="return category_edit()">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="upid">上级栏目：</label>
                                    <div class="col-sm-10">
                                            <select id="upid" name="upid" class="form-control select2" style="width: 100%;">
                                            <option value="0">顶级分类</option>
                                            <?php foreach ($category_up as $category):?>
                                            <option value="<?=$category['id']?>" <?=$category['id']===$category_info['upid']?'selected="selected"':'';?>><?=$category['name']?></option>
                                            <?php endforeach;?>
                                            </select>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">分类名称：</label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?=$category_info['name']?>" placeholder="" id="name" name="name">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="keywords">关键字：</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?=$category_info['keywords']?>" placeholder="" id="keywords" name="keywords">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="description">描述：</label>
                                    <div class="col-sm-10">
                                            <textarea name="description" id="description" cols="" rows="" class="form-control"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！"><?=$category_info['description']?></textarea>
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
function category_edit()
    {
      var datastring ='';
      var upid = $("#upid").val();
      var name = $("#name").val();
      var description = $("#description").val();
      var keywords = $("#keywords").val();
      if(name==='')
      {
          alert('请填写栏目名称');          
      }else
      {
//        datastring = datastring + 'categoryname=' + categoryname + '&upcategory=' + upcategory + '&description=' + description + '&keywords=' + keywords + '&flag=' + flag +'&id=' + <?=$id?>;
        datastring = {
            'name':name,
            'upid':upid,
            'description':description,
            'keywords':keywords,
            'id':<?=$id?>,
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
        type:"POST",
        url:"<?=$site_url?>/user_products/category_edit_save",
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

