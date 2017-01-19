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
<div class="aboutline">
     <div class="aboutlineIN">
         <div class="aboutlineIN_cur">The current position：<a href="../index.html">Home</a>&nbsp;>&nbsp;<a href="index.html">Application</a></div>
         <div class="aboutlineIN_tel">Hotline：+86-573-86408083</div>
     </div>
</div>
<!-----面包屑end----->
<!--内容部分start-->
<div id="content">
        
         <!----------首页应用领域 start--------->
         
             <div class="application_in">
                   <div class="indexprod_title">APPLICATION</span></div>
                 <div class="indexprod_text">Our advantage is the wealth of experience, based on advanced technology, we have over more than 20 years of experience...</div>
                 <!-- 鼠标悬停代码部分begin -->
        <div class="lanrenzhijia">
            <ul>
              <li><img src="http://www.hengyefastener.com/d/file/application/2015-06-19/83969af0bda67150ce0893c1e1775aad.jpg" /><a class="mark" title="Wooden furniture"></a> </li>
<li><img src="http://www.hengyefastener.com/d/file/application/2015-06-19/f9ba27a8379c0d7a0c51744b10c8c969.jpg" /><a class="mark" title="Wooden houses built"></a> </li>
<li><img src="http://www.hengyefastener.com/d/file/application/2015-06-19/4e1ad04b94e7f41188f4cf320c22299f.jpg" /><a class="mark" title="The slide"></a> </li>
<li><img src="http://www.hengyefastener.com/d/file/application/2015-06-19/439db0d7615d817beded9fa1713023fd.jpg" /><a class="mark" title="Fence"></a> </li>
<li><img src="http://www.hengyefastener.com/d/file/application/2015-06-19/75b1c52f47709a430ca7e8626150fca3.jpg" /><a class="mark" title="Wooden houses"></a> </li>
<li><img src="http://www.hengyefastener.com/d/file/application/2015-06-19/ef4b3ebf4edbb4bd4a19f80a4f8d1f77.jpg" /><a class="mark" title="Housing construction"></a> </li>

            </ul>
        </div>
        <div class="clefire"></div>
<script type="text/javascript">
$(function(){
	$w =320;
	$h = 181;
	$w2 = $w + 20;
	$h2 = $h + 20;
	$('.lanrenzhijia img').hover(function(){
		 $(this).stop().animate({height:$h2,width:$w2,left:"-20px",top:"-20px"},300);
	},function(){
		 $(this).stop().animate({height:$h,width:$w,left:"0px",top:"0px"},300);
	});
});
</script>
        <!--鼠标悬停代码部分end -->
             </div>             
      
        <!----------首页应用领域 end--------->
</div>
<div class="clefire"></div>
<!----内容部分end---->
               
        
<!-------------网站底部start------------>
<?php
 include_once '_footer.php';
 ?>
  <!-------------网站底部end ------------->
<div style="display:none"><script type="text/javascript"></script></div>
<script src="<?=$base_url?>skin/default/js/jquery.qrcode.min.js" type="text/javascript"></script>


</div>

</body>

<!-- Mirrored from www.hengyefastener.com/en/application/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Jan 2017 06:13:49 GMT -->
</html>