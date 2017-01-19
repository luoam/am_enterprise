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
<div id="carousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
    <li data-target="#carousel" data-slide-to="1"></li>
  </ol>
  <!-- Wrapper for slides -->  
  <div class="carousel-inner" role="listbox">

    <div class="active item">
        <a href="#" target="_blank"><img src="<?=$tupian['index_1']?>" width="100%"></a>
    </div>
    <div class="item">
        <a href="#" target="_blank"><img src="<?=$tupian['index_2']?>" width="100%"></a>
    </div>
  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left fui-arrow-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right fui-arrow-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div><!--carousel-->
            </div>  

<div class="panel panel-default mts">
    <div class="panel-heading">
        <h3 class="panel-title">
            当前：<?=$category_info['upcategoryname']<>''?'<a href="'.$base_url.'index/category/'.$category_info['upcategory'].'">'.$category_info['upcategoryname'].'</a>&nbsp;-&nbsp;':''?><a href="<?=$base_url?>index/category/<?=$category_info['id']?>"><?=$category_info['categoryname']?></a>
        </h3>
    </div>
    <div class="panel-body">
      <?php
      foreach ($article_list as $value):
      ?>
            <article style="border-bottom: 1px solid #ddd">
            <h4><a href="<?=$base_url?>index/article/<?=$value['id']?>"><b><?=$value['title']?></b></a></h4>
            <p class="text-left">
                <?=$value['degest'];?>
            </p>
            <p class="text-right">
               <span class="glyphicon glyphicon-bookmark"> <a href="<?=$base_url?>index/category/<?=$value['category']?>"><?=($value['categoryname'])?></a>&nbsp;&nbsp;</span>
               <span class="hidden-xs glyphicon glyphicon-time"><?=date('Y-m-d H:i',$value['dataline'])?>&nbsp;&nbsp;</span>
               <span class="glyphicon glyphicon-eye-open"><?=$value['pageview']?>阅读</span>
               <br class="hidden-sm hidden-md hidden-lg glyphicon glyphicon-time">
               <span class="hidden-sm hidden-md hidden-lg glyphicon glyphicon-time"><?=date('Y-m-d h:i',$value['dataline'])?></span>
           </p>
            </article>
    <?php
    endforeach;
    ?>
    </div>
      <nav>
          <ul class="pagination">
              <?php
              echo $this->pagination->create_links();
              ?>
            </ul>
          </nav> <!-- /pagination -->
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

