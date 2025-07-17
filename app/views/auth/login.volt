<div class="login-page">
    <div class="register-box">
        <div class="register-logo">
            <b>Đăng nhập</b> tài khoản
        </div>
        <div class="login-box-body border rounded">
            {% include 'components/messages.volt' %}
            <form method="post" action="{{ url('auth/login') }}">
                <div class="form-group has-feedback">
                    <input class="form-control" type="email" name="email" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input class="form-control" type="password" name="password" placeholder="Mật khẩu">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-block btn-flat" type="submit">Đăng nhập</button>
                    </div>
                </div>
                <br>
                <div>
                    <a href="{{ url('auth/register') }}" class="text-center">Chưa có tài khoản? Đăng ký</a> |
                    <a href="" class="text-center">Quên mật khẩu?</a>
                </div>
            </form>
        </div>
    </div>
</div>