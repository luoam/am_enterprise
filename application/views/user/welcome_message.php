<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
include_once '_header.php';
?>
</head>
<body>
  <!-- Content Wrapper. Contains page content -->
  <div class="right-container">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content no-padding">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">欢迎</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="30%">服务器计算机名</th>
				<td><span id="lbServerName"><?=$_SERVER['SERVER_NAME']?></span></td>
			</tr>
			<tr>
				<td>服务器IP地址</td>
				<td><?=$_SERVER['SERVER_ADDR']?></td>
			</tr>
			<tr>
				<td>服务器域名</td>
				<td><?=$_SERVER['HTTP_HOST']?></td>
			</tr>
			<tr>
				<td>服务器端口 </td>
				<td><?=$_SERVER['REMOTE_PORT']?></td>
			</tr>
			<tr>
				<td>本文件所在文件夹 </td>
				<td><?=$_SERVER['DOCUMENT_ROOT']?></td>
			</tr>
			<tr>
				<td>服务器操作系统 </td>
				<td><?=$_SERVER['SERVER_SIGNATURE']?></td>
			</tr>
                        <tr>
                            <td colspan="2">
                                
                            </td>
                        </tr>
		</tbody>
	</table>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
	<p>页面执行时间 <strong>{elapsed_time}</strong> 秒. </p>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
include_once '_footer.php';
?>
<!-- SlimScroll -->
<script src="<?=$base_url?>static/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=$base_url?>static/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=$base_url?>static/adminlte/js/app.min.js"></script>
<!-- diy js-->
<script src="<?=$base_url?>static/adminlte/js/diy.js"></script>
</body>
</html>