<div class="container-form-register mx-auto h-100">
    <h2 class="text-center">Đăng ký tài khoản</h2>

    {{ flashSession.output() }}
    <div>
        <form method="post" action="{{ url('auth/register') }}">
        <div class="mb-3">
            <label class="form-label">Tên đăng nhập</label>
            <input class="form-control" type="text" name="username" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input class="form-control" type="email" name="email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Mật khẩu</label>
            <input class="form-control" type="password" name="password" required>
        </div>
            <div class="mb-3">
            <label class="form-label">Nhập lại mật khẩu</label>
            <input class="form-control" type="password" name="confirm_password" required>
        </div>
        <button class="btn btn-primary m-auto" type="submit">Đăng ký</button>
    </div>
    </form>
</div>