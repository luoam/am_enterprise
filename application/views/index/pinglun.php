<?php

/* 
 * author:Anman Luo
 * website:http://www.luoanman.com
 */
?>
<div class="row clearfix"></div>
<div id="comment_box" class="row mtl">
    <ol class="list-group" id="ul">
        <?php foreach ($comment_list as $value):?>
        <li class="list-group-item">
            <div name="comment<?=  xss_clean($value['id'])?>" id="comment<?=  xss_clean($value['id'])?>" class="row">
            <div class="col-sm-2 hidden-xs">
                <img style="width: 100%; height: 100%;" alt="<?=  xss_clean($value['author_name'])?>" src="http://cdn.v2ex.com/gravatar/<?=md5(strtolower($value['author_email']))?>?s=70&d=mm&r=g">
            </div>
            <div class="col-sm-10">
                <h4 class="h4"><a rel="nofollow" href="<?=  xss_clean($value['author_url'])?>"><?=  xss_clean($value['author_name'])?></a>&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="reply('<?=  xss_clean($value['id'])?>')" href="#message_box">回复</a></h4>
              <?php
              if(xss_clean($value['up_id']) != 0){
                  echo '<b>@</b><a href="#comment'.xss_clean($value['up_id']).'">'.xss_clean($value['up_author_name']).'</a>：';
              }
              ?><?=  $value['message'];?>
            </div>  

            </div>
        </li>      
      <?php endforeach;?>
    </ol>
</div>

<div name="message_box" id="message_box" class="row">
<form class="col-sm-12 form-horizontal" onsubmit="return asubmit()">
    <input id="up_id" name="up_id" class="sr-only" value="0">
  <div class="form-group">
    <label for="author_name" class="col-sm-2">名字:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="author_name" name="author_name" value="<?=  $cookie_author['author_name'];?>" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="author_email" class="col-sm-2">邮箱:</label>
    <div class="col-sm-10">
        <input type="email" class="form-control" id="author_email" name="author_email" value="<?=  $cookie_author["author_email"];?>" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="author_url" class="col-sm-2">网址:</label>
    <div class="col-sm-10">
        <input type="url" class="form-control" id="author_url" name="author_url" value="<?=  $cookie_author["author_url"];?>" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="message" class="col-sm-2">内容:</label>
    <div class="col-sm-10">

        <textarea name="message" class="form-control" tabindex="1" id="message" style="height: 160px; overflow: hidden;" placeholder="" rows="10" cols="45"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success" id="submit">提交</button>
    </div>
  </div>
</form>
</div>
<script>
   function reply(up_id){
       $("#up_id").val(up_id);
   } 
   var get_csrf_hash;   
    get_csrf_hash = '<?=$this->security->get_csrf_hash()?>';
   function asubmit(){
    $('#submit').html("正在提交...");
    $('#submit').prop('disabled',true);
    var up_id=$("#up_id").val();
    var author_name = $("#author_name").val();
    var author_email = $("#author_email").val();   
    var author_url = $("#author_url").val();
    var message = $("#message").val();
    if(author_name===null||author_name===""||message===null||message===""){
        alert("评论要有内容哦");
        $('#submit').html("确认");
        $('#submit').prop('disabled',false);
    }else{    
    var datastring ='';
    datastring = {
        'author_name':author_name,
        'author_email':author_email,
        'author_url':author_url,
        'message':message,
        'up_id':up_id,
        'thread_key':'<?=$article_info['id']?>',
        'created_at':'<?=  time()?>',
        '<?php echo $this->security->get_csrf_token_name(); ?>':get_csrf_hash
    };
    $.ajax({
      type:"POST",
      url:"<?=$base_url?>index/comment_save",
      data:datastring,
      dataType:"json",
      success:function(sdata){
        //alert(sdata.errmsg);        
        $('#submit').html("确认");
        $('#submit').prop('disabled',false);
        if (sdata.data==="1") {        
          alert("评论成功");     
          get_csrf_hash = sdata.csrf_token;
          $("#message").val("");
          //var str='<li>'+message+'</li>';
          
           var str='<div>';
            str+='           <div class="col-sm-2 control-label hidden-xs">';
            str+='    <img style="width: 100%; height: 100%;"  src="">';
            str+='</div>';
            str+='<div class="col-sm-10">';
            str+='    <h4 class="h4"><a rel="nofollow" href="'+author_url+'">'+author_name+'</a></h4>';
            str+=message;
            str+='</div>';  
            str+='<hr style="width: 98%; align-content: center; color: #e4e7ea; border: 1px solid;">';
            str+='</div>';  
          
          var li = document.createElement("li");
          li.innerHTML=str;
          $("#ul").append(li);
        }
      }
    });  
}
    return false;       
   }
</script>