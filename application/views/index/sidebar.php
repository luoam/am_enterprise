<?php

/* 
 * author:Anman Luo
 * website:http://www.luoanman.com
 */
?>
<aside class="hidden-xs  hidden-sm col-md-4 col-lg-4">
    <style type="text/css">
        /* Custom Styles */
        .affix{
            top: 70px;
        }    
    </style>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><a href="<?=$site_url?>"><?=$site['name']?></a>欢迎您</h3>
        </div>
        <div class="panel-body">
        <p><?=$site['abstract']?></p>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">阅读次数top10</h3>
        </div>
        <div class="panel-body">
            <?php
            foreach ($hot_list as $hot):
            ?>
                <p><a href="<?=$base_url?>index/article/<?=$hot['id']?>"><?=$hot['title']?></a><small class="text-muted"><?=$hot['pageview']?> 阅读</small></p>
            <?php
            endforeach;
            ?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">最新的留言</h3>
        </div>
        <div class="panel-body">
            <?php
            foreach ($comment_top10 as $value):
            ?>
            <p>
                <a rel="nofollow" href="<?=  xss_clean($value['author_url'])?>"><?=  xss_clean($value['author_name'])?></a>:
                <a href="<?=$base_url?>index/article/<?=$value['thread_key']?>#comment<?=  xss_clean($value['id'])?>"><?=  xss_clean($value['message'])?></a>
            </p>
            <?php
            endforeach;
            ?>
        </div>
    </div>
    <div class="radius-border" data-spy="affix" data-offset-top="1100">
        <img src="<?=$tupian['right_1']?>">
    </div>
</aside>


