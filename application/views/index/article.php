<?php

/* 
 * author:Anman Luo
 * website:http://www.luoanman.com
 */
?>
<?php
 include_once 'header.php';
 ?>
    <meta name="keywords" content="<?=  xss_clean($article_info['keywords'])?>">
    <meta name="description" content="<?=  xss_clean($article_info['degest'])?>">
    <meta name="author" content="<?=$site['name']?>">
    <title><?=$site['name']?>-<?=  xss_clean($article_info['title'])?></title>
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
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a href="<?=$base_url?>"><?=$site['name']?></a> / <a href="<?=$base_url?>index/category/<?=$article_info['category']?>"><?=$article_info['categoryname']?></a>
                </h3>
            </div>
            <div class="panel-body">
                <article style="border-bottom: 1px solid #ddd">
                <h3 class="text-center"><a href="<?=$base_url?>index/article/<?=$article_info['id']?>"><b><?=  xss_clean($article_info['title'])?></b></a></h3>
                       <p class="text-center">
                           <span class="glyphicon glyphicon-bookmark"> <a href="<?=$base_url?>index/category/<?=$article_info['category']?>"><?=$article_info['categoryname']?></a>&nbsp;&nbsp;</span>
                          <span class="hidden-xs glyphicon glyphicon-time"><?=date('Y-m-d H:i',$article_info['dataline'])?>&nbsp;&nbsp;</span>
                          <span class="glyphicon glyphicon-eye-open"><?=$article_info['pageview']?>阅读</span>
                      </p>

                      <div>
                          <?=$article_info['data']?>
                                                   
                          <?php
                            include_once 'dashang.php';
                          ?>
                          <p class="text-danger hidden-sm hidden-md hidden-lg">发布于：<?=date('Y-m-d h:i',$article_info['dataline'])?><br>
                          </p>

                      </div>
                </article>
            <nav>
                <ul  class="list-unstyled">
                    <li class="pull-left"><a href="<?=$base_url?>index/article/<?=$pre_article_info['id']?>"><?=$pre_article_info['title']?></a></li>
                    <li class="pull-right"><a href="<?=$base_url?>index/article/<?=$next_article_info['id']?>"><?=$next_article_info['title']?></a></li>
                </ul>
            </nav>     
              <!--评论框-->
            <?php
            include_once 'pinglun.php';
            ?>          
            </div>
        </div>
        </main>

<?php
include_once 'sidebar.php';
?>    
    
    </div>
    </div> <!-- /container -->
    </section> 
<?php
include_once 'footer.php';
?>
  </body>
</html>
