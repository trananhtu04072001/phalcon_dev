<div class="register-page">
    <div class="register-box">
        <div class="register-logo">
            <b>Đăng ký</b> tài khoản
        </div>
        <div class="register-box-body border rounded">
            <p class="register-box-msg">Điền thông tin để tạo tài khoản mới</p>
            {% include 'components/messages.volt' %}
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
                    <input class="form-control" type="text" name="phone" placeholder="Số điện thoại">
                    <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input class="form-control" type="password" name="password" placeholder="Mật khẩu">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input class="form-control" type="password" name="confirm_password" placeholder="Nhập lại mật khẩu">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
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