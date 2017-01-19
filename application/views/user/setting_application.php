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
 <title><?=$site['name']?> | <?=$user_site['name']?>应用设置</title>
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
          <h3 class="page-header">应用设置</h3>
          </div>
          <div class="col-xs-12">
            <article class="page-container">
                    <form class="form form-horizontal" id="form-site" onsubmit="return application_save()">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="application_1">application图一：</label>
                                    <div class="col-sm-10">
                                        <div id="uploader_application_1">
                                        <div id="fileList_application_1" class="uploader-list"></div>
                                        <div id="filePicker_application_1">选择图片</div>
                                        <button id="btn-star_application_1" class="btn btn-default btn-uploadstar radius ml-10">开始上传</button>
                                        <div class="input-group">
                                        <input name="application_1" id="application_1" value="<?=$application['application_1'];?>" class="form-control" type="text">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" onclick="showimg('application_1');">预览</button>
                                        </span>
                                        </div>  
                                        </div>
                                        <img id="application_1m" style="display: none;" src="<?=$base_url.$application['application_1'];?>">
                                        <script>
                                            function showimg(it)
                                            {
                                                if(it==='application_1')
                                                {                                                    
                                                    $("#application_1m").toggle();
                                                }
                                                if(it==='application_2')
                                                {
                                                    $("#application_2m").toggle();
                                                }
                                                if(it==='application_3')
                                                {                                                    
                                                    $("#application_3m").toggle();
                                                }
                                                if(it==='application_4')
                                                {
                                                    $("#application_4m").toggle();
                                                }
                                                if(it==='application_5')
                                                {                                                    
                                                    $("#application_5m").toggle();
                                                }
                                                if(it==='application_6')
                                                {
                                                    $("#application_6m").toggle();
                                                }
                                            }
                                            </script>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="application_2">application图二：</label>
                                    <div class="col-sm-10">
                                        <div id="uploader_application_2">
                                        <div id="fileList_application_2" class="uploader-list"></div>
                                        <div id="filePicker_application_2">选择图片</div>
                                        <button id="btn-star_application_2" class="btn btn-default btn-uploadstar radius ml-10">开始上传</button>
                                        <div class="input-group">
                                        <input name="application_2" id="application_2" value="<?=$application['application_2'];?>" class="form-control" type="text">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" onclick="showimg('application_2');">预览</button>
                                        </span>
                                        </div> 
                                        </div>  
                                        <img id="application_2m" style="display: none;" src="<?=$base_url.$application['application_2'];?>">
                                    </div>
                            </div>
                        <div class="form-group">
                                <label class="col-sm-2 control-label" for="application_2">application图三：</label>
                                    <div class="col-sm-10">
                                        <div id="uploader_application_3">
                                        <div id="fileList_application_3" class="uploader-list"></div>
                                        <div id="filePicker_application_3">选择图片</div>
                                        <button id="btn-star_application_3" class="btn btn-default btn-uploadstar radius ml-10">开始上传</button>
                                        <div class="input-group">
                                        <input name="application_3" id="application_3" value="<?=$application['application_3'];?>" class="form-control" type="text">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" onclick="showimg('application_3');">预览</button>
                                        </span>
                                        </div> 
                                        </div>  
                                        <img id="application_3m" style="display: none;" src="<?=$base_url.$application['application_3'];?>">
                                    </div>
                            </div>
                        <div class="form-group">
                                <label class="col-sm-2 control-label" for="application_4">application图四：</label>
                                    <div class="col-sm-10">
                                        <div id="uploader_application_4">
                                        <div id="fileList_application_4" class="uploader-list"></div>
                                        <div id="filePicker_application_4">选择图片</div>
                                        <button id="btn-star_application_4" class="btn btn-default btn-uploadstar radius ml-10">开始上传</button>
                                        <div class="input-group">
                                        <input name="application_4" id="application_4" value="<?=$application['application_4'];?>" class="form-control" type="text">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" onclick="showimg('application_4');">预览</button>
                                        </span>
                                        </div> 
                                        </div>  
                                        <img id="application_4m" style="display: none;" src="<?=$base_url.$application['application_4'];?>">
                                    </div>
                            </div>
                        <div class="form-group">
                                <label class="col-sm-2 control-label" for="application_5">application图五：</label>
                                    <div class="col-sm-10">
                                        <div id="uploader_application_5">
                                        <div id="fileList_application_5" class="uploader-list"></div>
                                        <div id="filePicker_application_5">选择图片</div>
                                        <button id="btn-star_application_5" class="btn btn-default btn-uploadstar radius ml-10">开始上传</button>
                                        <div class="input-group">
                                        <input name="application_5" id="application_5" value="<?=$application['application_5'];?>" class="form-control" type="text">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" onclick="showimg('application_5');">预览</button>
                                        </span>
                                        </div> 
                                        </div>  
                                        <img id="application_5m" style="display: none;" src="<?=$base_url.$application['application_5'];?>">
                                    </div>
                            </div>
                        <div class="form-group">
                                <label class="col-sm-2 control-label" for="application_6">application图六：</label>
                                    <div class="col-sm-10">
                                        <div id="uploader_application_6">
                                        <div id="fileList_application_6" class="uploader-list"></div>
                                        <div id="filePicker_application_6">选择图片</div>
                                        <button id="btn-star_application_6" class="btn btn-default btn-uploadstar radius ml-10">开始上传</button>
                                        <div class="input-group">
                                        <input name="application_6" id="application_6" value="<?=$application['application_6'];?>" class="form-control" type="text">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" onclick="showimg('application_6');">预览</button>
                                        </span>
                                        </div> 
                                        </div>  
                                        <img id="application_6m" style="display: none;" src="<?=$base_url.$application['application_6'];?>">
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
 $list_application_1 = $("#fileList_application_1"),
 $btn_application_1 = $("#btn-star_application_1"),
 state = "pending",
 uploader_application_1;

 var uploader_application_1 = WebUploader.create({
  auto: false,
  swf: '<?=$base_url?>static/plugins/webuploader/Uploader.swf',
 
  // 文件接收服务端。
  server: '<?=$base_url?>user_application/webuploader',
 
  // 选择文件的按钮。可选。
  // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: {
                id: '#filePicker_application_1',
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
 uploader_application_1.on( 'fileQueued', function( file ) {
  var $li = $(
   '<div id="' + file.id + '" class="item">' +
    '<div class="pic-box"><img></div>'+
    '<div class="info">' + file.name + '</div>' +
    '<p class="state">等待上传...</p>'+
   '</div>'
  ),
  $img = $li.find('img');
  $list_application_1.append( $li );
 
  // 创建缩略图
  // 如果为非图片文件，可以不用调用此方法。
  // thumbnailWidth x thumbnailHeight 为 100 x 100
                var thumbnailWidth = 100;
                var thumbnailHeight = 100;
  uploader_application_1.makeThumb( file, function( error, src ) {
   if ( error ) {
    $img.replaceWith('<span>不能预览</span>');
    return;
   }
 
   $img.attr( 'src', src );
  }, thumbnailWidth, thumbnailHeight );
 });
 // 文件上传过程中创建进度条实时显示。
 uploader_application_1.on( 'uploadProgress', function( file, percentage ) {
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
 uploader_application_1.on( 'uploadSuccess', function( file,rep) {
                var response = eval(rep);
                if(response.code === 201)
                {
                    $( '#'+file.id ).addClass('upload-state-success').find(".state").text("已上传");
                    $('#application_1').val(response.message);
                }else
                {
                    $( '#'+file.id ).addClass('upload-state-error').find(".state").text(response.message);
                }
  
 });
 
 // 文件上传失败，显示上传出错。
 uploader_application_1.on( 'uploadError', function( file ) {
  $( '#'+file.id ).addClass('upload-state-error').find(".state").text("上传出错");
 });
 
 // 完成上传完了，成功或者失败，先删除进度条。
 uploader_application_1.on( 'uploadComplete', function( file ) {
  $( '#'+file.id ).find('.progress-box').fadeOut();
 });
 uploader_application_1.on('all', function (type) {
        if (type === 'startUpload') {
            state = 'uploading';
        } else if (type === 'stopUpload') {
            state = 'paused';
        } else if (type === 'uploadFinished') {
            state = 'done';
        }

        if (state === 'uploading') {
            $btn_application_1.text('暂停上传');
        } else {
            $btn_application_1.text('开始上传');
        }
    });

    $btn_application_1.on('click', function () {
        if (state === 'uploading') {
            uploader_application_1.stop();
        } else {
            uploader_application_1.upload();
        }
        return false;
    });
</script>
<script>
 $list_application_2 = $("#fileList_application_2"),
 $btn_application_2 = $("#btn-star_application_2"),
 state = "pending",
 uploader_application_2;

 var uploader_application_2 = WebUploader.create({
  auto: false,
  swf: '<?=$base_url?>static/plugins/webuploader/Uploader.swf',
 
  // 文件接收服务端。
  server: '<?=$base_url?>user_application/webuploader',
 
  // 选择文件的按钮。可选。
  // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: {
                id: '#filePicker_application_2',
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
 uploader_application_2.on( 'fileQueued', function( file ) {
  var $li = $(
   '<div id="' + file.id + '" class="item">' +
    '<div class="pic-box"><img></div>'+
    '<div class="info">' + file.name + '</div>' +
    '<p class="state">等待上传...</p>'+
   '</div>'
  ),
  $img = $li.find('img');
  $list_application_2.append( $li );
 
  // 创建缩略图
  // 如果为非图片文件，可以不用调用此方法。
  // thumbnailWidth x thumbnailHeight 为 100 x 100
                var thumbnailWidth = 100;
                var thumbnailHeight = 100;
  uploader_application_2.makeThumb( file, function( error, src ) {
   if ( error ) {
    $img.replaceWith('<span>不能预览</span>');
    return;
   }
 
   $img.attr( 'src', src );
  }, thumbnailWidth, thumbnailHeight );
 });
 // 文件上传过程中创建进度条实时显示。
 uploader_application_2.on( 'uploadProgress', function( file, percentage ) {
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
 uploader_application_2.on( 'uploadSuccess', function( file,rep) {
                var response = eval(rep);
                if(response.code === 201)
                {
                    $( '#'+file.id ).addClass('upload-state-success').find(".state").text("已上传");
                    $('#application_2').val(response.message);
                }else
                {
                    $( '#'+file.id ).addClass('upload-state-error').find(".state").text(response.message);
                }
  
 });
 
 // 文件上传失败，显示上传出错。
 uploader_application_2.on( 'uploadError', function( file ) {
  $( '#'+file.id ).addClass('upload-state-error').find(".state").text("上传出错");
 });
 
 // 完成上传完了，成功或者失败，先删除进度条。
 uploader_application_2.on( 'uploadComplete', function( file ) {
  $( '#'+file.id ).find('.progress-box').fadeOut();
 });
 uploader_application_2.on('all', function (type) {
        if (type === 'startUpload') {
            state = 'uploading';
        } else if (type === 'stopUpload') {
            state = 'paused';
        } else if (type === 'uploadFinished') {
            state = 'done';
        }

        if (state === 'uploading') {
            $btn_application_2.text('暂停上传');
        } else {
            $btn_application_2.text('开始上传');
        }
    });

    $btn_application_2.on('click', function () {
        if (state === 'uploading') {
            uploader_application_2.stop();
        } else {
            uploader_application_2.upload();
        }
        return false;
    });
</script>
<script>
 $list_application_3 = $("#fileList_application_3"),
 $btn_application_3 = $("#btn-star_application_3"),
 state = "pending",
 uploader_application_3;

 var uploader_application_3 = WebUploader.create({
  auto: false,
  swf: '<?=$base_url?>static/plugins/webuploader/Uploader.swf',
 
  // 文件接收服务端。
  server: '<?=$base_url?>user_application/webuploader',
 
  // 选择文件的按钮。可选。
  // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: {
                id: '#filePicker_application_3',
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
 uploader_application_3.on( 'fileQueued', function( file ) {
  var $li = $(
   '<div id="' + file.id + '" class="item">' +
    '<div class="pic-box"><img></div>'+
    '<div class="info">' + file.name + '</div>' +
    '<p class="state">等待上传...</p>'+
   '</div>'
  ),
  $img = $li.find('img');
  $list_application_3.append( $li );
 
  // 创建缩略图
  // 如果为非图片文件，可以不用调用此方法。
  // thumbnailWidth x thumbnailHeight 为 100 x 100
                var thumbnailWidth = 100;
                var thumbnailHeight = 100;
  uploader_application_3.makeThumb( file, function( error, src ) {
   if ( error ) {
    $img.replaceWith('<span>不能预览</span>');
    return;
   }
 
   $img.attr( 'src', src );
  }, thumbnailWidth, thumbnailHeight );
 });
 // 文件上传过程中创建进度条实时显示。
 uploader_application_3.on( 'uploadProgress', function( file, percentage ) {
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
 uploader_application_3.on( 'uploadSuccess', function( file,rep) {
                var response = eval(rep);
                if(response.code === 201)
                {
                    $( '#'+file.id ).addClass('upload-state-success').find(".state").text("已上传");
                    $('#application_3').val(response.message);
                }else
                {
                    $( '#'+file.id ).addClass('upload-state-error').find(".state").text(response.message);
                }
  
 });
 
 // 文件上传失败，显示上传出错。
 uploader_application_3.on( 'uploadError', function( file ) {
  $( '#'+file.id ).addClass('upload-state-error').find(".state").text("上传出错");
 });
 
 // 完成上传完了，成功或者失败，先删除进度条。
 uploader_application_3.on( 'uploadComplete', function( file ) {
  $( '#'+file.id ).find('.progress-box').fadeOut();
 });
 uploader_application_3.on('all', function (type) {
        if (type === 'startUpload') {
            state = 'uploading';
        } else if (type === 'stopUpload') {
            state = 'paused';
        } else if (type === 'uploadFinished') {
            state = 'done';
        }

        if (state === 'uploading') {
            $btn_application_3.text('暂停上传');
        } else {
            $btn_application_3.text('开始上传');
        }
    });

    $btn_application_3.on('click', function () {
        if (state === 'uploading') {
            uploader_application_3.stop();
        } else {
            uploader_application_3.upload();
        }
        return false;
    });
</script>
<script>
 $list_application_4 = $("#fileList_application_4"),
 $btn_application_4 = $("#btn-star_application_4"),
 state = "pending",
 uploader_application_4;

 var uploader_application_4 = WebUploader.create({
  auto: false,
  swf: '<?=$base_url?>static/plugins/webuploader/Uploader.swf',
 
  // 文件接收服务端。
  server: '<?=$base_url?>user_application/webuploader',
 
  // 选择文件的按钮。可选。
  // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: {
                id: '#filePicker_application_4',
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
 uploader_application_4.on( 'fileQueued', function( file ) {
  var $li = $(
   '<div id="' + file.id + '" class="item">' +
    '<div class="pic-box"><img></div>'+
    '<div class="info">' + file.name + '</div>' +
    '<p class="state">等待上传...</p>'+
   '</div>'
  ),
  $img = $li.find('img');
  $list_application_4.append( $li );
 
  // 创建缩略图
  // 如果为非图片文件，可以不用调用此方法。
  // thumbnailWidth x thumbnailHeight 为 100 x 100
                var thumbnailWidth = 100;
                var thumbnailHeight = 100;
  uploader_application_4.makeThumb( file, function( error, src ) {
   if ( error ) {
    $img.replaceWith('<span>不能预览</span>');
    return;
   }
 
   $img.attr( 'src', src );
  }, thumbnailWidth, thumbnailHeight );
 });
 // 文件上传过程中创建进度条实时显示。
 uploader_application_4.on( 'uploadProgress', function( file, percentage ) {
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
 uploader_application_4.on( 'uploadSuccess', function( file,rep) {
                var response = eval(rep);
                if(response.code === 201)
                {
                    $( '#'+file.id ).addClass('upload-state-success').find(".state").text("已上传");
                    $('#application_4').val(response.message);
                }else
                {
                    $( '#'+file.id ).addClass('upload-state-error').find(".state").text(response.message);
                }
  
 });
 
 // 文件上传失败，显示上传出错。
 uploader_application_4.on( 'uploadError', function( file ) {
  $( '#'+file.id ).addClass('upload-state-error').find(".state").text("上传出错");
 });
 
 // 完成上传完了，成功或者失败，先删除进度条。
 uploader_application_4.on( 'uploadComplete', function( file ) {
  $( '#'+file.id ).find('.progress-box').fadeOut();
 });
 uploader_application_4.on('all', function (type) {
        if (type === 'startUpload') {
            state = 'uploading';
        } else if (type === 'stopUpload') {
            state = 'paused';
        } else if (type === 'uploadFinished') {
            state = 'done';
        }

        if (state === 'uploading') {
            $btn_application_4.text('暂停上传');
        } else {
            $btn_application_4.text('开始上传');
        }
    });

    $btn_application_4.on('click', function () {
        if (state === 'uploading') {
            uploader_application_4.stop();
        } else {
            uploader_application_4.upload();
        }
        return false;
    });
</script>
<script>
 $list_application_5 = $("#fileList_application_5"),
 $btn_application_5 = $("#btn-star_application_5"),
 state = "pending",
 uploader_application_5;

 var uploader_application_5 = WebUploader.create({
  auto: false,
  swf: '<?=$base_url?>static/plugins/webuploader/Uploader.swf',
 
  // 文件接收服务端。
  server: '<?=$base_url?>user_application/webuploader',
 
  // 选择文件的按钮。可选。
  // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: {
                id: '#filePicker_application_5',
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
 uploader_application_5.on( 'fileQueued', function( file ) {
  var $li = $(
   '<div id="' + file.id + '" class="item">' +
    '<div class="pic-box"><img></div>'+
    '<div class="info">' + file.name + '</div>' +
    '<p class="state">等待上传...</p>'+
   '</div>'
  ),
  $img = $li.find('img');
  $list_application_5.append( $li );
 
  // 创建缩略图
  // 如果为非图片文件，可以不用调用此方法。
  // thumbnailWidth x thumbnailHeight 为 100 x 100
                var thumbnailWidth = 100;
                var thumbnailHeight = 100;
  uploader_application_5.makeThumb( file, function( error, src ) {
   if ( error ) {
    $img.replaceWith('<span>不能预览</span>');
    return;
   }
 
   $img.attr( 'src', src );
  }, thumbnailWidth, thumbnailHeight );
 });
 // 文件上传过程中创建进度条实时显示。
 uploader_application_5.on( 'uploadProgress', function( file, percentage ) {
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
 uploader_application_5.on( 'uploadSuccess', function( file,rep) {
                var response = eval(rep);
                if(response.code === 201)
                {
                    $( '#'+file.id ).addClass('upload-state-success').find(".state").text("已上传");
                    $('#application_5').val(response.message);
                }else
                {
                    $( '#'+file.id ).addClass('upload-state-error').find(".state").text(response.message);
                }
  
 });
 
 // 文件上传失败，显示上传出错。
 uploader_application_5.on( 'uploadError', function( file ) {
  $( '#'+file.id ).addClass('upload-state-error').find(".state").text("上传出错");
 });
 
 // 完成上传完了，成功或者失败，先删除进度条。
 uploader_application_5.on( 'uploadComplete', function( file ) {
  $( '#'+file.id ).find('.progress-box').fadeOut();
 });
 uploader_application_5.on('all', function (type) {
        if (type === 'startUpload') {
            state = 'uploading';
        } else if (type === 'stopUpload') {
            state = 'paused';
        } else if (type === 'uploadFinished') {
            state = 'done';
        }

        if (state === 'uploading') {
            $btn_application_5.text('暂停上传');
        } else {
            $btn_application_5.text('开始上传');
        }
    });

    $btn_application_5.on('click', function () {
        if (state === 'uploading') {
            uploader_application_5.stop();
        } else {
            uploader_application_5.upload();
        }
        return false;
    });
</script>
<script>
 $list_application_6 = $("#fileList_application_6"),
 $btn_application_6 = $("#btn-star_application_6"),
 state = "pending",
 uploader_application_6;

 var uploader_application_6 = WebUploader.create({
  auto: false,
  swf: '<?=$base_url?>static/plugins/webuploader/Uploader.swf',
 
  // 文件接收服务端。
  server: '<?=$base_url?>user_application/webuploader',
 
  // 选择文件的按钮。可选。
  // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: {
                id: '#filePicker_application_6',
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
 uploader_application_6.on( 'fileQueued', function( file ) {
  var $li = $(
   '<div id="' + file.id + '" class="item">' +
    '<div class="pic-box"><img></div>'+
    '<div class="info">' + file.name + '</div>' +
    '<p class="state">等待上传...</p>'+
   '</div>'
  ),
  $img = $li.find('img');
  $list_application_6.append( $li );
 
  // 创建缩略图
  // 如果为非图片文件，可以不用调用此方法。
  // thumbnailWidth x thumbnailHeight 为 100 x 100
                var thumbnailWidth = 100;
                var thumbnailHeight = 100;
  uploader_application_6.makeThumb( file, function( error, src ) {
   if ( error ) {
    $img.replaceWith('<span>不能预览</span>');
    return;
   }
 
   $img.attr( 'src', src );
  }, thumbnailWidth, thumbnailHeight );
 });
 // 文件上传过程中创建进度条实时显示。
 uploader_application_6.on( 'uploadProgress', function( file, percentage ) {
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
 uploader_application_6.on( 'uploadSuccess', function( file,rep) {
                var response = eval(rep);
                if(response.code === 201)
                {
                    $( '#'+file.id ).addClass('upload-state-success').find(".state").text("已上传");
                    $('#application_6').val(response.message);
                }else
                {
                    $( '#'+file.id ).addClass('upload-state-error').find(".state").text(response.message);
                }
  
 });
 
 // 文件上传失败，显示上传出错。
 uploader_application_6.on( 'uploadError', function( file ) {
  $( '#'+file.id ).addClass('upload-state-error').find(".state").text("上传出错");
 });
 
 // 完成上传完了，成功或者失败，先删除进度条。
 uploader_application_6.on( 'uploadComplete', function( file ) {
  $( '#'+file.id ).find('.progress-box').fadeOut();
 });
 uploader_application_6.on('all', function (type) {
        if (type === 'startUpload') {
            state = 'uploading';
        } else if (type === 'stopUpload') {
            state = 'paused';
        } else if (type === 'uploadFinished') {
            state = 'done';
        }

        if (state === 'uploading') {
            $btn_application_6.text('暂停上传');
        } else {
            $btn_application_6.text('开始上传');
        }
    });

    $btn_application_6.on('click', function () {
        if (state === 'uploading') {
            uploader_application_6.stop();
        } else {
            uploader_application_6.upload();
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
function application_save()
    {
      var datastring ='';
      var application_1 = $("#application_1").val();
      var application_2 = $("#application_2").val();
      var application_3 = $("#application_3").val();
      var application_4 = $("#application_4").val();
      var application_5 = $("#application_5").val();
      var application_6 = $("#application_6").val();
      datastring = {
          'application_1' : application_1,
          'application_2' : application_2,
          'application_3' : application_3,
          'application_4' : application_4,
          'application_5' : application_5,
          'application_6' : application_6,
          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
      };
      $.ajax({
        type:"POST",
        url:"<?=$site_url?>/user_application/application_update",
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

