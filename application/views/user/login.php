<?php
include_once '_header.php';
?>
  <link rel="stylesheet" href="<?=$base_url?>static/plugins/iCheck/square/blue.css">
    <title><?=$site['name']?> | 登录</title>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
      <a href="<?=$site_url?>"><b><?=$site['name']?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">登录</p>

    <?=form_open('/user_login/login_check', 'class="form form-horizontal" id="form"')?>
      <div class="form-group has-feedback">
          <input type="text" id="username" name="username" class="form-control" placeholder="帐号">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" id="password" name="password" class="form-control" placeholder="密码">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> 记住我
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- 或 -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">忘记密码?</a><br>
    <a href="#" class="text-center">新用户注册</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php
include_once '_footer.php';
?>
<!-- iCheck -->
<script src="<?=$base_url?>static/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
