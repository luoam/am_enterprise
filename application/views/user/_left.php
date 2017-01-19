<?php

/* 
 * Author : luoanman
 * Blog : http://www.luoanman.com
 * Email : 609892502@qq.com
 */
?>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left info">

        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
          <li class="header"><a href="<?=$site_url?>/user_index">主菜单</a></li>
        <li class="treeview <?=$active==='news'?'active':''?>">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>新闻管理</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=$site_url?>/user_news/category_index"><i class="fa fa-circle-o"></i> 栏目列表</a></li>
            <li><a href="<?=$site_url?>/user_news/category_add"><i class="fa fa-circle-o"></i> 添加栏目</a></li>
            <li><a href="<?=$site_url?>/user_news/news_index"><i class="fa fa-circle-o"></i> 新闻列表</a></li>
            <li><a href="<?=$site_url?>/user_news/news_add"><i class="fa fa-circle-o"></i> 添加新闻</a></li>
          </ul>
        </li>
        
        <li class="treeview <?=$active==='products'?'active':''?>">
          <a href="#">
            <i class="fa fa-list-ul"></i>
            <span>产品管理</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=$site_url?>/user_products/category_index"><i class="fa fa-circle-o"></i> 栏目列表</a></li>
            <li><a href="<?=$site_url?>/user_products/category_add"><i class="fa fa-circle-o"></i> 添加栏目</a></li>
            <li><a href="<?=$site_url?>/user_products/products_index"><i class="fa fa-circle-o"></i> 产品列表</a></li>
            <li><a href="<?=$site_url?>/user_products/products_add"><i class="fa fa-circle-o"></i> 添加产品</a></li>
          </ul>
        </li>
        <li class="treeview <?=$active==='comment'?'active':''?>">
          <a href="#">
            <i class="fa fa-comments-o"></i>
            <span>需求管理</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">1</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=$site_url?>/admin_comment"><i class="fa fa-circle-o"></i> 需求列表</a></li>
          </ul>
        </li>        
        
        <li class="treeview <?=$active==='links'?'active':''?>">
          <a href="#">
            <i class="fa fa-link"></i>
            <span>留言管理</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=$site_url?>/admin_links"><i class="fa fa-circle-o"></i> 留言列表</a></li>
          </ul>
        </li>        
        
        <li class="treeview <?=$active==='user'?'active':''?>">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>用户管理</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=$site_url?>/user_user/edit"><i class="fa fa-circle-o"></i> 修改用户</a></li>
          </ul>
        </li>        
        
        <li class="treeview <?=$active==='site'?'active':''?>">
          <a href="#">
            <i class="fa fa-gears"></i>
            <span>系统管理</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=$site_url?>/user_site"><i class="fa fa-circle-o"></i> 网站设置</a></li>
            <li><a href="<?=$site_url?>/user_logo"><i class="fa fa-circle-o"></i> LOGO设置</a></li>
            <li><a href="<?=$site_url?>/user_banner"><i class="fa fa-circle-o"></i> Banner设置</a></li>
            <li><a href="<?=$site_url?>/user_profile"><i class="fa fa-circle-o"></i> 属性设置</a></li>
            <li><a href="<?=$site_url?>/user_application"><i class="fa fa-circle-o"></i> 应用设置</a></li>
            <li><a href="<?=$site_url?>/user_service"><i class="fa fa-circle-o"></i> 服务设置</a></li>
            <li><a href="<?=$site_url?>/user_contact"><i class="fa fa-circle-o"></i> 联系方式</a></li>
          </ul>
        </li>        
        
        
        
        
<!--        <li>
          <a href="../widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">Hot</small>
            </span>
          </a>
        </li>-->

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

