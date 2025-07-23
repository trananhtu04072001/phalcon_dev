{% extends 'layouts/main.volt' %}
{% block title %}Cài đặt{% endblock %}

{% block content %} 
<div>
    <form id="updateProfileForm" enctype="multipart/form-data">
        <h5 class="mb-4">Cập nhật người dùng</h5>
        <div class="row">
            <!-- Cột bên trái -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Tên đăng nhập</label>
                    <input type="text" class="form-control" name="name" value="{{ userLogged['name'] }}">
                    <div class="text-danger error-msg" data-name="name"></div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ userLogged['email'] }}">
                    <div class="text-danger error-msg" data-name="email"></div>
                </div>

                <div class="form-group">
                    <div class="avatar-preview" id="avatar_preview">
                        <img id="avatar_img" src="/{{ userLogged['avatar'] }}" width="120" height="120"></img>
                    </div>
                    <label for="avatar">Ảnh</label>
                    <input type="file" class="form-control" id="avatar_profile" name="avatar">
                </div>
            </div>
            <!-- Cột bên phải -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fullName">Tên đầy đủ</label>
                    <input type="text" class="form-control" name="full_name" value="{{ userLogged['full_name'] }}">
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
{% endblock %}
