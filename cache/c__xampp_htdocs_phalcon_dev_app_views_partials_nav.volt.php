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