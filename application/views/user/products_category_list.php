<?php

/* 
 * Author : luoanman
 * Blog : http://www.luoanman.com
 * Email : 609892502@qq.com
 */
?>
<?php
include_once '_header.php';
$active = 'products';
?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=$base_url?>static/plugins/datatables/dataTables.bootstrap.css">
 <title><?=$site['name']?> | <?=$user_site['name']?>栏目管理</title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php
  include_once '_nav.php';
?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
<?php
      include_once '_left.php';
?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!--    <section class="content-header">

    </section>-->

    <!-- Main content -->
    <section class="invoice no-margin">

      <!-- Default box -->
      <div class="row">
          <div class="col-xs-12">
          <h3 class="page-header">栏目列表</h3>
          </div>
          <div class="col-xs-12">              
            <div class="table-responsive">
            <table id="articles" class="table table-bordered table-hover">
			<thead>
				<tr class="text-c">					
					<th>ID</th>
					<th>栏目名称</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
                            <?php foreach ($category_list as $category):?>
                            <?php
                            $id =$category['id'];
                            ?>
				<tr class="text-c">
					<td><?=$category['id']?></td>
					<td class="text-l"><?=$category['name']?></td>
                                        <td class="f-14"><a title="编辑" href="<?=$site_url?>/user_products/category_edit/<?=$category['id']?>" style="text-decoration:none"><i class="glyphicon glyphicon-pencil"></i></a> <a title="删除" href="<?=$site_url?>/user_products/category_del/<?=$category['id']?>" class="ml-5" style="text-decoration:none"><i class="glyphicon glyphicon-trash"></i></a></td>
				</tr>
                                <?php endforeach;?>
			</tbody>
		</table>
          </div>
          </div>
        </div>
      <!-- /.row -->
      <div class="row">
            <div class="col-sm-5">
                <div class="dataTables_info" id="articles_info" role="status" aria-live="polite">
                    显示 <?=$fenye?> 到 <?=$per_end?> 共 <?=$total?> 条
                </div>                    
            </div>
          <div class="col-sm-7">
              <div class="dataTables_paginate paging_simple_numbers" id="articles_paginate">
                <ul class="pagination">
                    <?php
                    echo $this->pagination->create_links();
                    ?>
                </ul>
              </div>
          </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->
<?php
include_once '_footer.php';
?>
<!-- DataTables -->
<script src="<?=$base_url?>static/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=$base_url?>static/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=$base_url?>static/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=$base_url?>static/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=$base_url?>static/adminlte/js/app.min.js"></script>
<!-- page script -->
<script>
  $(function () {    
    $('#articles').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "aaSorting": [[ 0, "asc" ]],//默认第几个排序
        "bStateSave": false,//状态保存
        "aoColumnDefs": [
        //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
        {"orderable":false,"aTargets":[2]}// 不参与排序的列
        ],
        "language": {
    "decimal":        "",
    "emptyTable":     "没有数据",
    "info":           "显示 _START_ 到 _END_ 共 _TOTAL_ 条",
    "infoEmpty":      "显示 0 到 0 共 0 条",
    "infoFiltered":   "(从 _MAX_ 中过滤)",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "显示 _MENU_ 条",
    "loadingRecords": "加载中...",
    "processing":     "进行中...",
    "search":         "搜索:",
    "zeroRecords":    "没有匹配记录",
    "paginate": {
        "first":      "首页",
        "last":       "末页",
        "next":       "下一页",
        "previous":   "上一页"
    },
    "aria": {
        "sortAscending":  ": 顺序排列",
        "sortDescending": ": 倒序排列"
    }
}
    });
  });
</script>
</body>
</html>