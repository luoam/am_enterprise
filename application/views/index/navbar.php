<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=$site_url?>"><b><?=$site['name']?></b></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
            <li><a href="<?=$site_url?>"><b>首页</b></a></li>
          <?php
          foreach ($category_list as $value):
          ?>
            <li><a href="<?=$base_url?>index/category/<?=$value['id']?>"><b><?=$value['categoryname']?></b></a></li>
          <?php endforeach;?>
          <li><a href="<?=$site_url?>/index/links"><b>友邻</b></a></li>
      </ul>
      <div class="nav navbar-right">
        <form class="navbar-form navbar-left" action="<?=$site_url?>index/search/" onsubmit="return asearch()">
        <div class="form-group">
        <div class="input-group">
          <input class="form-control" id="search" name="search" type="search" placeholder="核电">
          <span class="input-group-btn">
            <button type="submit" class="btn btn-default">Search</button>
          </span>            
        </div>
        </div>               
        </form> 
      </div>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<script>
    function asearch()
    {
        var search = $("#search").val();
        location.href = "<?=$site_url?>index/search/" + search;
        return false;     
    }
</script>