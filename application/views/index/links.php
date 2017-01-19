<?php

/* 
 * author:Anman Luo
 * website:http://www.luoanman.com
 */
?>
<?php
 include_once 'header.php';
 ?>
    <meta name="keywords" content="<?=$site['keywords']?>">
    <meta name="description" content="<?=$site['description']?>">
    <meta name="author" content="<?=$site['name']?>">
    <title><?=$site['name']?></title>
</head>
<body>
<?php
include_once 'navbar.php';
?>
<section class="content-wrapper">
<div class="container">
    <div class="row">
        <main class="col-xs-12 col-sm-12 col-md-8 col-lg-8 " style="margin-top:0;">
        <div class="row">
            <div class=" radius-border">
                <div>
                    <?=$site['name']?>网址：<?=$base_url?>
                </div>
            </div>  

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                <a href="<?=$base_url?>"><?=$site['name']?></a> / <a href="<?=$base_url?>index/links">友情链接</a>
                    <a class="pull-right" href="#" data-toggle="modal" data-target="#myModal">自助添加链接</a>
                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills">
                    <?php 
                    foreach ($links_list as $value):
                        ?>
                <li>
                    <a class="well" href="<?=$base_url?>index/link_jump/<?=$value['id']?>" title="<?=$value['description']?>" target="_blank"><?=$value['webname']?>
                        <span class="badge"><?=$value['views']?></span>
                        </a>
                </li>
                    <?php
                    endforeach;
                    ?>
                </ul>    
            </div>
        </div>
        </div>            
        </main>
<?php
include_once 'sidebar.php';
?>    
    
    
    
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">填写信息</h4>
      </div>
      <div class="modal-body">
<form class="form-horizontal" onsubmit="return asubmit()">
  <div class="form-group">
    <label for="webname" class="col-sm-2">博客名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="webname" name="webname" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="weburl" class="col-sm-2">博客链接</label>
    <div class="col-sm-10">
        <input type="url" class="form-control" id="weburl" name="url" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="keywords" class="col-sm-2">关键字</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="keywords" name="keywords" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="degest" class="col-sm-2">简介</label>
    <div class="col-sm-10">
        <textarea name="degest" class="form-control" tabindex="1" id="degest" style="height: 160px; overflow: hidden;" placeholder=""></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="name" class="col-sm-2">博主姓名</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="tel" class="col-sm-2">博主电话</label>
    <div class="col-sm-10">
        <input type="tel" class="form-control" id="tel" name="tel" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2">博主邮箱</label>
    <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success" id="submit">提交</button>
    </div>
  </div>
</form>  
      </div>
    </div>
  </div>
</div>   

</div>
</div> <!-- /container -->
</section> 
<?php
include_once 'footer.php';
?>
<script>
   function asubmit(){
    $('#submit').html("正在提交...");
    $('#submit').prop('disabled',true);
    var webname=$("#webname").val();
    var weburl = $("#weburl").val();
    var keywords = $("#keywords").val();   
    var degest=$("#degest").val();
    var name=$("#name").val();
    var tel=$("#tel").val();
    var email=$("#email").val();
    if(webname===""||weburl===""){
        alert("有信息未填");
        $('#submit').html("确认");
        $('#submit').prop('disabled',false);
    }else{    
    var datastring ='';
    datastring = {
        'webname':webname,
        'weburl':weburl,
        'keywords':keywords,
        'degest':degest,
        'name':name,
        'tel':tel,
        'email':email,
         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
    };
    $.ajax({
      type:"POST",
      url:"<?=$base_url?>index/link_add",
      data:datastring,
      dataType:"json",
      success:function(sdata){
        $('#submit').html("确认");
        $('#submit').prop('disabled',false);
            alert(sdata.errmsg);      
            location.reload();
      }
    });  
}
    return false;       
   }    
</script>
</body>
</html>
