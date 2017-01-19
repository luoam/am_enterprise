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
<link rel="stylesheet" type="text/css" href="<?=$base_url?>static/plugins/webuploader/webuploader.css">
 <title><?=$site['name']?> | <?=$user_site['name']?>Banne设置</title>
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
          <h3 class="page-header">Banner设置</h3>
          </div>
          <div class="col-xs-12">
            <article class="page-container">
                    <form class="form form-horizontal" id="form-site" onsubmit="return tupian_save()">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="banner_1">banner图一：</label>
                                    <div class="col-sm-10">
                                        <div id="uploader_banner_1">
                                        <div id="fileList_banner_1" class="uploader-list"></div>
                                        <div id="filePicker_banner_1">选择图片</div>
                                        <button id="btn-star_banner_1" class="btn btn-default btn-uploadstar radius ml-10">开始上传</button>
                                        <div class="input-group">
                                        <input name="banner_1" id="banner_1" value="<?=$banner['banner_1'];?>" class="form-control" type="text">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" onclick="showimg('banner_1');">预览</button>
                                        </span>
                                        </div>  
                                        </div>
                                        <img id="banner_1m" style="display: none;" src="<?=$base_url.$banner['banner_1'];?>">
                                        <script>
                                            function showimg(it)
                                            {
                                                if(it==='banner_1')
                                                {
                                                    
                                                    $("#banner_1m").toggle();
                                                }
                                                if(it==='banner_2')
                                                {
                                                    $("#banner_2m").toggle();
                                                }
                                                
                                            }
                                            </script>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="banner_2">banner图二：</label>
                                    <div class="col-sm-10">
                                        <div id="uploader_banner_2">
                                        <div id="fileList_banner_2" class="uploader-list"></div>
                                        <div id="filePicker_banner_2">选择图片</div>
                                        <button id="btn-star_banner_2" class="btn btn-default btn-uploadstar radius ml-10">开始上传</button>
                                        <div class="input-group">
                                        <input name="banner_2" id="banner_2" value="<?=$banner['banner_2'];?>" class="form-control" type="text">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" onclick="showimg('banner_2');">预览</button>
                                        </span>
                                        </div> 
                                        </div>  
                                        <img id="banner_2m" style="display: none;" src="<?=$base_url.$banner['banner_2'];?>">
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
<!--webuploader -->
<script type="text/javascript" src="<?=$base_url?>static/plugins/webuploader/webuploader.js"></script>
<script type="text/javascript">
$(function(){

});
</script>
<script>
 $list_banner_1 = $("#fileList_banner_1"),
 $btn_banner_1 = $("#btn-star_banner_1"),
 state = "pending",
 uploader_banner_1;

 var uploader_banner_1 = WebUploader.create({
  auto: false,
  swf: '<?=$base_url?>static/plugins/webuploader/Uploader.swf',
 
  // 文件接收服务端。
  server: '<?=$base_url?>user_banner/webuploader',
 
  // 选择文件的按钮。可选。
  // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: {
                id: '#filePicker_banner_1',
                innerHTML: '点击选择文件',
                multiple:false
                },
 
  // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
  resize: false,
  // 只允许选择图片文件。
  accept: {
   title: 'file',
   extensions: 'jpg,png',
   mimeTypes: 'image/*,application/*'
  }
 });
 uploader_banner_1.on( 'fileQueued', function( file ) {
  var $li = $(
   '<div id="' + file.id + '" class="item">' +
    '<div class="pic-box"><img></div>'+
    '<div class="info">' + file.name + '</div>' +
    '<p class="state">等待上传...</p>'+
   '</div>'
  ),
  $img = $li.find('img');
  $list_banner_1.append( $li );
 
  // 创建缩略图
  // 如果为非图片文件，可以不用调用此方法。
  // thumbnailWidth x thumbnailHeight 为 100 x 100
                var thumbnailWidth = 100;
                var thumbnailHeight = 100;
  uploader_banner_1.makeThumb( file, function( error, src ) {
   if ( error ) {
    $img.replaceWith('<span>不能预览</span>');
    return;
   }
 
   $img.attr( 'src', src );
  }, thumbnailWidth, thumbnailHeight );
 });
 // 文件上传过程中创建进度条实时显示。
 uploader_banner_1.on( 'uploadProgress', function( file, percentage ) {
  var $li = $( '#'+file.id ),
   $percent = $li.find('.progress-box .sr-only');
 
  // 避免重复创建
  if ( !$percent.length ) {
   $percent = $('<div class="progress-box"><span class="progress-bar radius"><span class="sr-only" style="width:0%"></span></span></div>').appendTo( $li ).find('.sr-only');
  }
  $li.find(".state").text("上传中");
  $percent.css( 'width', percentage * 100 + '%' );
 });
 
 // 文件上传成功，给item添加成功class, 用样式标记上传成功。
 uploader_banner_1.on( 'uploadSuccess', function( file,rep) {
                var response = eval(rep);
                if(response.code === 201)
                {
                    $( '#'+file.id ).addClass('upload-state-success').find(".state").text("已上传");
                    $('#banner_1').val(response.message);
                }else
                {
                    $( '#'+file.id ).addClass('upload-state-error').find(".state").text(response.message);
                }
  
 });
 
 // 文件上传失败，显示上传出错。
 uploader_banner_1.on( 'uploadError', function( file ) {
  $( '#'+file.id ).addClass('upload-state-error').find(".state").text("上传出错");
 });
 
 // 完成上传完了，成功或者失败，先删除进度条。
 uploader_banner_1.on( 'uploadComplete', function( file ) {
  $( '#'+file.id ).find('.progress-box').fadeOut();
 });
 uploader_banner_1.on('all', function (type) {
        if (type === 'startUpload') {
            state = 'uploading';
        } else if (type === 'stopUpload') {
            state = 'paused';
        } else if (type === 'uploadFinished') {
            state = 'done';
        }

        if (state === 'uploading') {
            $btn_banner_1.text('暂停上传');
        } else {
            $btn_banner_1.text('开始上传');
        }
    });

    $btn_banner_1.on('click', function () {
        if (state === 'uploading') {
            uploader_banner_1.stop();
        } else {
            uploader_banner_1.upload();
        }
        return false;
    });
</script>
<script>
 $list_banner_2 = $("#fileList_banner_2"),
 $btn_banner_2 = $("#btn-star_banner_2"),
 state = "pending",
 uploader_banner_2;

 var uploader_banner_2 = WebUploader.create({
  auto: false,
  swf: '<?=$base_url?>static/plugins/webuploader/Uploader.swf',
 
  // 文件接收服务端。
  server: '<?=$base_url?>user_banner/webuploader',
 
  // 选择文件的按钮。可选。
  // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: {
                id: '#filePicker_banner_2',
                innerHTML: '点击选择文件',
                multiple:false
                },
 
  // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
  resize: false,
  // 只允许选择图片文件。
  accept: {
   title: 'file',
   extensions: 'jpg,png',
   mimeTypes: 'image/*,application/*'
  }
 });
 uploader_banner_2.on( 'fileQueued', function( file ) {
  var $li = $(
   '<div id="' + file.id + '" class="item">' +
    '<div class="pic-box"><img></div>'+
    '<div class="info">' + file.name + '</div>' +
    '<p class="state">等待上传...</p>'+
   '</div>'
  ),
  $img = $li.find('img');
  $list_banner_2.append( $li );
 
  // 创建缩略图
  // 如果为非图片文件，可以不用调用此方法。
  // thumbnailWidth x thumbnailHeight 为 100 x 100
                var thumbnailWidth = 100;
                var thumbnailHeight = 100;
  uploader_banner_2.makeThumb( file, function( error, src ) {
   if ( error ) {
    $img.replaceWith('<span>不能预览</span>');
    return;
   }
 
   $img.attr( 'src', src );
  }, thumbnailWidth, thumbnailHeight );
 });
 // 文件上传过程中创建进度条实时显示。
 uploader_banner_2.on( 'uploadProgress', function( file, percentage ) {
  var $li = $( '#'+file.id ),
   $percent = $li.find('.progress-box .sr-only');
 
  // 避免重复创建
  if ( !$percent.length ) {
   $percent = $('<div class="progress-box"><span class="progress-bar radius"><span class="sr-only" style="width:0%"></span></span></div>').appendTo( $li ).find('.sr-only');
  }
  $li.find(".state").text("上传中");
  $percent.css( 'width', percentage * 100 + '%' );
 });
 
 // 文件上传成功，给item添加成功class, 用样式标记上传成功。
 uploader_banner_2.on( 'uploadSuccess', function( file,rep) {
                var response = eval(rep);
                if(response.code === 201)
                {
                    $( '#'+file.id ).addClass('upload-state-success').find(".state").text("已上传");
                    $('#banner_2').val(response.message);
                }else
                {
                    $( '#'+file.id ).addClass('upload-state-error').find(".state").text(response.message);
                }
  
 });
 
 // 文件上传失败，显示上传出错。
 uploader_banner_2.on( 'uploadError', function( file ) {
  $( '#'+file.id ).addClass('upload-state-error').find(".state").text("上传出错");
 });
 
 // 完成上传完了，成功或者失败，先删除进度条。
 uploader_banner_2.on( 'uploadComplete', function( file ) {
  $( '#'+file.id ).find('.progress-box').fadeOut();
 });
 uploader_banner_2.on('all', function (type) {
        if (type === 'startUpload') {
            state = 'uploading';
        } else if (type === 'stopUpload') {
            state = 'paused';
        } else if (type === 'uploadFinished') {
            state = 'done';
        }

        if (state === 'uploading') {
            $btn_banner_2.text('暂停上传');
        } else {
            $btn_banner_2.text('开始上传');
        }
    });

    $btn_banner_2.on('click', function () {
        if (state === 'uploading') {
            uploader_banner_2.stop();
        } else {
            uploader_banner_2.upload();
        }
        return false;
    });
</script>

<!-- SlimScroll -->
<script src="<?=$base_url?>static/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=$base_url?>static/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=$base_url?>static/adminlte/js/app.min.js"></script>
<script type="text/javascript">
function tupian_save()
    {
      var datastring ='';
      var banner_1 = $("#banner_1").val();
      var banner_2 = $("#banner_2").val();
      datastring = {
          'banner_1' : banner_1,
          'banner_2' : banner_2,
          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
      };
      $.ajax({
        type:"POST",
        url:"<?=$site_url?>/user_banner/banner_update",
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

