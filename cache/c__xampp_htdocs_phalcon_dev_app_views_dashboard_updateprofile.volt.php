<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Cài đặt</title>
        <link rel="stylesheet" href="<?php echo $this->url->get('css/app.css')?>"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->url->get('img/favicon.ico')?>"/>
    </head>
    <body>
        <!-- Dashboard Layout with Sidebar Menu using Bootstrap 4.1 -->
        <div class="container-fluid p-0">
        <!-- Header -->
<nav class="navbar navbar-dark bg-dark mb-0 rounded-0 d-flex justify-content-between align-items-center">
    <span class="navbar-brand mb-0 h1">Phần mềm quản lí</span>
    <a class="text-white nav-link" href="#">
    <i class="fas fa-user"></i> <!-- Thêm FontAwesome nếu muốn icon -->
    Xin chào: <?= $userLogged['full_name'] ?>
    </a>
</nav>
        <div class="row no-gutters">
            <?php $route = $this->router->getControllerName() . '/' . $this->router->getActionName(); ?>
<!-- Sidebar -->
<nav class="col-12 col-sm-3 col-md-2 bg-light sidebar py-3" style="min-height:100vh; border-right:1px solid #eee;">
    <div class="font-weight-bold px-3 mb-3" style="font-size:16px;">Quản lí</div>
    <ul class="nav flex-column" id="sidebarMenu">
        <li class="nav-item <?= ($route == 'dashboard/' ? 'active' : '') ?>">
        <a class="nav-link" href="<?= $this->url->get('dashboard') ?>">
            <i class="fas fa-tachometer-alt"></i> Trang chủ
        </a>
        </li>
        <li class="nav-item <?= ($route == 'dashboard/updateProfile' ? 'active' : '') ?>">
        <a class="nav-link" href="<?= $this->url->get('dashboard/updateProfile') ?>">
            <i class="fas fa-cog"></i> Cài đặt
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= $this->url->get('auth/logout') ?>">
            <i class="fas fa-sign-out-alt"></i> Đăng xuất
        </a>
        </li>
    </ul>
</nav>
            <!-- Main Content -->
            <main class="col-12 col-sm-9 col-md-10 px-4 py-4">
                 
<div>
    <?php $errors = $this->flashSession->getMessages('error'); ?>
<?php if (!empty($errors)) { ?>
    <div class="alert alert-danger">
        <ul>
        <?php foreach ($errors as $message) { ?>
            <li><?= $message ?></li>
        <?php } ?>
        </ul>
    </div>
<?php } ?>
<?php $success = $this->flashSession->getMessages('success'); ?>
<?php if (!empty($success)) { ?>
    <div class="alert alert-success">
        <?php foreach ($success as $message) { ?>
            <p><?= $message ?></p>
        <?php } ?>
    </div>
<?php } ?>
    <form method="post" action="<?= $this->url->get('dashboard/updateProfile') ?>" enctype="multipart/form-data">
        <h5 class="mb-4">Cập nhật người dùng</h5>
        <div class="row">
            <!-- Cột bên trái -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Tên đăng nhập</label>
                    <input type="text" class="form-control" name="name" value="<?= $userLogged['name'] ?>">
                    <div class="text-danger error-msg" data-name="name"></div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= $userLogged['email'] ?>">
                    <div class="text-danger error-msg" data-name="email"></div>
                </div>

                <div class="form-group">
                    <div class="avatar-preview" id="avatar_preview">
                        <img id="avatar_img" src="<?= $userLogged['avatar'] ?>" width="120" height="120"></img>
                    </div>
                    <label for="avatar">Ảnh</label>
                    <input type="file" class="form-control" id="avatar" name="avatar">
                </div>
            </div>
            <!-- Cột bên phải -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fullName">Tên đầy đủ</label>
                    <input type="text" class="form-control" name="full_name" value="<?= $userLogged['full_name'] ?>">
                    <div class="text-danger error-msg" data-name="full_name"></div>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu mới (để trống nếu không đổi)</label>
                    <input type="password" class="form-control" id="edit_password" name="password">
                    <div class="text-danger error-msg" data-name="password"></div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
    </form>
</div>

            </main>
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
