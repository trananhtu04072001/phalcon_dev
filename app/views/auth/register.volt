<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta
		name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Đăng kí tài khoản</title>
		<link rel="stylesheet" href="<?php echo $this->url->get('css/app.css')?>"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->url->get('img/favicon.ico')?>"/>
	</head>
	<body>
		<div class="container">
			{% include 'components/messages.volt' %}
			<div class="register-page">
				<div class="register-box">
					<div class="register-logo">
						<b>Đăng ký</b>
						tài khoản
					</div>
					<div class="register-box-body border rounded">
						<p class="register-box-msg">Điền thông tin để tạo tài khoản mới</p>
						<form method="post" action="{{ url('auth/register') }}">
							<div class="form-group has-feedback">
								<input class="form-control" type="text" name="name" placeholder="Tên đăng nhập">
								<span class="glyphicon glyphicon-user form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<input class="form-control" type="text" name="full_name" placeholder="Tên đầy đủ">
								<span class="glyphicon glyphicon-font form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<input class="form-control" type="email" name="email" placeholder="Email">
								<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<input class="form-control" type="password" name="password" placeholder="Mật khẩu">
								<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<input class="form-control" type="password" name="confirm_password" placeholder="Nhập lại mật khẩu">
								<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
							</div>
							<div class="row m-auto">
								<div class="col-xs-12">
									<button class="btn btn-primary btn-block btn-flat" type="submit">Đăng ký</button>
								</div>
							</div>
						</form>
						<br>
						<a href="{{ url('auth/login') }}" class="text-center">Đã có tài khoản? Đăng nhập</a>
					</div>
				</div>
			</div>
		</div>
		<!-- jQuery first, then Popper.js, and then Bootstrap's JavaScript -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="<?php echo $this->url->get('js/app.js')?>" crossorigin="anonymous"></script>
	</body>
</html>
