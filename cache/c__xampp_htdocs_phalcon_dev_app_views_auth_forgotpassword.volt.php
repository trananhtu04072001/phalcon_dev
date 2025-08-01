<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta
		name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Quên mật khẩu</title>
		<link rel="stylesheet" href="<?php echo $this->url->get('css/app.css')?>"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->url->get('img/favicon.ico')?>"/>
	</head>
	<body>
		<div class="container">
			<style>
    .alert-success-custom,
    .alert-danger-custom {
        position: absolute !important;
        right: 20px;
        z-index: 1000;
        transition: opacity 0.5s ease;
    }
    .alert ul {
        list-style: none;
        padding-left: 0;
        margin: 0;
    }
</style>
<?php $errors = $this->flashSession->getMessages('error'); ?>
<?php if (!empty($errors)) { ?>
    <div class="alert alert-danger alert-danger-custom">
        <ul>
        <?php foreach ($errors as $message) { ?>
            <li><?= $message ?></li>
        <?php } ?>
        </ul>
    </div>
<?php } ?>
<?php $success = $this->flashSession->getMessages('success'); ?>
<?php if (!empty($success)) { ?>
    <div class="alert alert-success alert-success-custom">
        <?php foreach ($success as $message) { ?>
            <p><?= $message ?></p>
        <?php } ?>
    </div>
<?php } ?>
			<div class="login-page">
				<div class="register-box">
					<div class="register-logo">
						<b>Quên mật khẩu</b>
					</div>
					<div class="login-box-body border rounded">
                        <form method="post" action="<?= $this->url->get('auth/forgotPassword') ?>">
							<div class="form-group has-feedback">
								<input class="form-control" type="email" name="email" placeholder="Email">
								<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
							</div>
							<div class="col-12">
								<button class="btn btn-primary btn-block btn-flat" type="submit">Gửi liên kết đặt lại mật khẩu</button>
							</div>
                        </form>
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
