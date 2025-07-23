<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta
		name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Đăng nhập</title>
		<link rel="stylesheet" href="<?php echo $this->url->get('css/app.css')?>"/>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->url->get('img/favicon.ico')?>"/>
	</head>
	<body>
		<div class="container">
			{% include 'components/messages.volt' %}
			<div class="login-page">
				<div class="register-box">
					<div class="register-logo">
						<b>Đăng nhập</b>
						tài khoản
					</div>
					<div class="login-box-body border rounded">
						<form id="loginForm" method="post" action="{{ url('auth/login') }}">
							<div class="form-group has-feedback">
								<input class="form-control" type="email" name="email" placeholder="Email">
								<div class="text-danger error-msg" data-name="email"></div>
							</div>
							<div class="form-group has-feedback">
								<input class="form-control" type="password" name="password" placeholder="Mật khẩu">
								<div class="text-danger error-msg" data-name="password"></div>
							</div>
							<div class="row m-auto">
								<div class="col-xs-12">
									<button class="btn btn-primary btn-block btn-flat" type="submit">Đăng nhập</button>
								</div>
							</div>
							<br>
							<div>
								<a href="{{ url('auth/register') }}" class="text-center">Chưa có tài khoản? Đăng ký</a>
								|
								<a href="{{ url('auth/forgotPassword') }}" class="text-center">Quên mật khẩu?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- jQuery first, then Popper.js, and then Bootstrap's JavaScript -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="<?php echo $this->url->get('js/app.js')?>" crossorigin="anonymous"></script>
	</body>
</html>
