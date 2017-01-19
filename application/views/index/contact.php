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
         <div class="aboutlineIN_cur">The current position：<a href="../index.html">Home</a>&nbsp;>&nbsp;<a href="index.html">Contact Us</a></div>
         <div class="aboutlineIN_tel">Hotline：+86-573-86408083</div>
     </div>
</div>
<!-----面包屑end----->

<!--内容部分start-->
<div id="content">
   <!-----左侧内容start-------->
        <div class=" conleftbox">
        <div class="top"><img src="../skin/default/images/aboutus_01.jpg" width="306" height="88" /></div>
        <div class="conlxwm">
         <ul>
    <li>
    <div class="logo"><img src="../../skin/default/images/b1.jpg" width="30" height="29" alt="" /></div>
    <div class="texts"><span class="context">Haiyan Hengye Fastener Co., Ltd  </span></div>
    </li>
    <li>
    <div class="logo"><img src="../../skin/default/images/b2.jpg" width="30" height="29" alt="" /></div>
    <div class="texts">Address：No.11,Jincheng Road,qinshan industrial</div>
    </li>
    <li>
    <div class="logo">&nbsp;</div>
    <div class="texts">park,Haiyan County, jiaxing city, Zhejiang.china</div>
    </li>
    <li>
    <div class="logo"><img src="../../skin/default/images/b4.jpg" width="30" height="29" alt="" /></div>
    <div class="texts">Tel：+86-573-86408083</div>
    </li>
    <li>
    <div class="logo">&nbsp;</div>
    <div class="texts">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;86408033 / 86408032</div>
    </li>
    <li>
    <div class="logo"><img src="../../skin/default/images/b5.jpg" width="30" height="29" alt="" /></div>
    <div class="texts">Fax：0573-86408031</div>
    </li>
    <li>
    <div class="logo"><img src="../../skin/default/images/b6.jpg" width="30" height="29" alt="" /></div>
    <div class="texts">E-mail：<a href="mailto:hengyefastener-daisy@vip.163.com">hengyefastener-daisy@vip.163.com</a></div>
    </li>
</ul>          
        </div>
   </div>
   <!-----------左侧内容end---------->

   <!--------右侧内容start------->
    <div class="conRightbox">
         <div class="top"><img src="../skin/default/images/aboutus_02.jpg" width="306" height="88" /></div>
         <div id="formbox">
                   <form onsubmit="return checkfeedback();" enctype="multipart/form-data" method="post" name="myform" action="http://www.hengyefastener.com/en/e/enews/index.php" target="_self">
                         <input name="ecmsfrom" type="hidden" value="9">
                        <input name="bid" type="hidden" value="1">
                        <input name="enews" type="hidden" value="AddFeedback">  
         <table width="480" border="0">
    <tr>
        <td width="47">Name</td>
        <td width="423">
            <label for="title"></label>
            <input type="text" name="name" id="title" />
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>Phone</td>
        <td>
            <label for="name"></label>
            <input type="text" name="mycall" id="name" />
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>Fax</td>
        <td>
            <input type="text" name="fax" id="tels" />
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>E-mail</td>
        <td>
            <label for="emails"></label>
            <input type="text" name="email" id="emails" />
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>Message</td>
        <td>
            <label for="contents"></label>
            <textarea name="title" id="contents" cols="45" rows="5"></textarea>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
     <td>Verification:</td>
     <td>
<label for="emails"></label>
<input  class="input-text" name="key" style="  width: 200px; height: 25px;border: 1px dashed #CCC;" type="text" size="15"> <img src="../e/ShowKey/indexc4a9.html?v=feedback" onClick="this.src='/e/ShowKey/?v=feedback&'+Math.random();"
alt="看不清楚,点击刷新" align="absmiddle" style=" width: 80px;margin-left: 20px;"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>
            <a href="#"><input type="submit" name="submits" id="submits" value="Send" /></a>
      </td>
    </tr>
</table>
</form>

         </div>
   </div>
   <!------右侧内容end----------->
  <div class="clefire"></div> 
    <div class="map">

  <!--百度地图容器-->
  <div>
   <img src="../skin/default/images/map.jpg" width="980" height="310">
 </div>

    </div>
</div>
<div class="clefire"></div>
               
        
<!-------------网站底部start------------>
<?php
 include_once '_footer.php';
 ?>
  <!-------------网站底部end ------------->
<div style="display:none"><script type="text/javascript"></script></div>
<script src="<?=$base_url?>skin/default/js/jquery.qrcode.min.js" type="text/javascript"></script>

</div>

</body>

<!-- Mirrored from www.hengyefastener.com/en/contact/Contact-Us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Jan 2017 06:14:09 GMT -->
</html>
