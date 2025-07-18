<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Cài đặt</title>
        <link rel="stylesheet" href="<?php echo $this->url->get('css/app.css')?>"/>
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
            <!-- Sidebar -->
<nav class="col-12 col-sm-3 col-md-2 bg-light sidebar py-3" style="min-height:100vh; border-right:1px solid #eee;">
    <div class="font-weight-bold px-3 mb-3" style="font-size:16px;">Quản lí</div>
    <ul class="nav flex-column" id="sidebarMenu">
        <li class="nav-item active">
        <a class="nav-link" href="<?= $this->url->get('dashboard') ?>">
            <i class="fas fa-tachometer-alt"></i> Trang chủ
        </a>
        </li>
        <li class="nav-item">
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
                

            </main>
        </div>
        </div>
        <!-- jQuery first, then Popper.js, and then Bootstrap's JavaScript -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="<?php echo $this->url->get('js/app.js')?>" crossorigin="anonymous"></script>
    </body>
</html>
