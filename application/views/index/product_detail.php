<?php

/* 
 * author:Anman Luo
 * website:http://www.luoanman.com
 */
?>
<?php
 include_once 'header.php';
 ?>
    <meta name="keywords" content="<?=$site['keywords']?>" />
    <meta name="description" content="<?=$site['description']?>" />
    <meta name="copyright" content="<?=$site['name']?>"/>
    <meta name="author" content="<?=$site['name']?>"/> 
    <title><?=$site['name']?></title>
</head>
<body>
<div class="wrap">
<!--------header  start--------------->
<?php
 include_once '_header.php';
 ?>
<!--------header end------------------>
				  
<!-------banner 大图 start----------->
<?php
 include_once '_banner.php';
 ?>
        <!-------banner 大图 end-----------> 



<!--内容部分start-->
<!-----面包屑start------>
<?php
 include_once 'product_breakfast_nav.php';
 ?>
<!-----面包屑end----->
<div id="content">

    <!--左侧导航start-->
<?php
 include_once 'product_left_side.php';
 ?>
   <!--左侧导航over-->
     <div class="mainbox">
          <!-------------------->
           <div class="mainboxdetail">
         <div class="box">
    <div class="tb-booth tb-pic tb-s310"><a><img src='http://www.hengyefastener.com/d/file/product/p2/2015-06-09/82c16332b08797743818d41f2fc2aa0d.png' rel='/d/file/product/p2/2015-06-09/82c16332b08797743818d41f2fc2aa0d.png' class='jqzoom' /></a> </div>
    <ul class="tb-thumb" id="thumblist">

<li><div class='tb-pic tb-s40'><a><img src='http://www.hengyefastener.com/d/file/product/p2/2015-06-09/82c16332b08797743818d41f2fc2aa0d.png' mid='/d/file/product/p2/2015-06-09/82c16332b08797743818d41f2fc2aa0d.png' big='/d/file/product/p2/2015-06-09/82c16332b08797743818d41f2fc2aa0d.png'></a></div></li>
<li><div class='tb-pic tb-s40'><a><img src='http://www.hengyefastener.com/d/file/product/p2/2015-06-09/910cf6e8f30def3bcf37e5a21dd77066.png' mid='/d/file/product/p2/2015-06-09/910cf6e8f30def3bcf37e5a21dd77066.png' big='/d/file/product/p2/2015-06-09/910cf6e8f30def3bcf37e5a21dd77066.png'></a></div></li>       
    </ul>
</div>
<script type="text/javascript">
$(document).ready(function(){

	$(".jqzoom").imagezoom();
	
	$("#thumblist li a").mouseover(function(){
		$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
		$(".jqzoom").attr('src',$(this).find("img").attr("mid"));
		$(".jqzoom").attr('rel',$(this).find("img").attr("big"));
	});

});
</script>
   <div class="pro_detar">
   </div> 
  
   </div>
   <DIV class="clefire"></DIV>
    <!--订购留言-->
       <!---------订购留言------>
          <!------------------->
           <div class="lydgtop"><div class="lydgtopIN">Message Center</div></div>
     <!--留言反馈start-->
     <div style="float:left; width:720px;">
	<div class="fb_form">
                   <form onsubmit="return checkfeedback();" enctype="multipart/form-data" method="post" name="myform" action="http://www.hengyefastener.com/en/e/enews/index.php" target="_self">
                         <input name="ecmsfrom" type="hidden" value="9">
                        <input name="bid" type="hidden" value="1">
                        <input name="enews" type="hidden" value="AddFeedback">  

			<table width="100%" height="400" class="feedback_table">
				<tbody>
					<tr>
						<td class="text">Name </td>
						<td class="input td_fl"><input class="input-text" name="name" size="77" type="text" value="" checked="checked"></td>
					</tr>
					<tr>
						<td class="text">Phone</td>
						<td class="input td_fl"><input class="input-text" name="mycall" size="77" type="text" value="" checked="checked"></td>
					</tr>
					<tr>
						<td class="text">Email</td>
						<td class="input td_fl"><input class="input-text" name="email" size="77" type="text" value="" checked="checked"></td>
					</tr>
					<tr>
						<td class="text">Fax </td>
						<td class="input td_fl"><input class="input-text" name="fax" size="77" type="text" value="" checked="checked"></td>
					</tr>
					<tr>
						<td class="text">Message</td>
						<td class="input td_fl"><textarea class="textarea-text" cols="76" rows="5" name="title" value="" checked="checked"></textarea></td>
					</tr>
					<tr>
						<td class="text">Verification:</td>
						<td class="input td_fl"><input  class="input-text" name="key" type="text" size="15"> <img src="../../e/ShowKey/indexc4a9.html?v=feedback" onClick="this.src='/e/ShowKey/?v=feedback&'+Math.random();"
alt="看不清楚,点击刷新" align="absmiddle" style=" width: 99px;margin-left: 20px;"></td>
					</tr>
				</tbody>
			</table>

		<div class="con_oth_button">
			<div class="final_butn">
				<button type="submit" value="Send" class="final_button" title="Send">Send</button>
			</div>
		</div>
		</form>
	</div>
</div>
<!--留言反馈over-->
           
     </div>
     <div class="clefire"></div>
 </div>
<div class="clefire"></div>

<!--内容部分over-->

                
        
<!-------------网站底部start------------>
<?php
 include_once '_footer.php';
 ?>
  <!-------------网站底部end ------------->
<div style="display:none"><script type="text/javascript"></script></div>
<script src="<?=$base_url?>skin/default/js/jquery.qrcode.min.js" type="text/javascript"></script>


</div>


</body>
</html>
