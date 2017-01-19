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
 include_once 'news_breakfase_nav.php';
 ?>
<!-----面包屑end----->

<div id="content">

    <!--左侧导航start-->
<?php
 include_once 'news_left_side.php';
 ?>
   <!--左侧导航over-->
     <div class="mainbox">
          <div class="newsbox">
            <ul>
 <li>
                    <h1>[Company News]</h1>
                    <h2><a href="gsxw/9.html">This year the German successfully held the exhibition</a></h2>
                    <h3>2015-06-24</h3>
                </li>

            </ul>
        <div class="m-page m-page-sr m-page-sm" style="">
            <a title="Total record" style="display:none;">&nbsp;<b>15</b> </a>&nbsp;&nbsp;&nbsp;<a>1</a>&nbsp;<a href="index_2.html">2</a>&nbsp;<a href="index_2.html">></a>&nbsp;<a href="index_2.html">>></a>
          </div>
        </div>
        
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
