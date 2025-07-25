<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="createUserForm" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="createUserLabel">Thêm người dùng mới</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
            <span aria-hidden="true">&times;</span>
          </button> 
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Tên đăng nhập</label>
            <span class="text-required">*</span>
            <input type="text" class="form-control" id="name" name="name">
            <div class="text-danger error-msg" data-name="name"></div>
          </div>
          <div class="form-group">
            <label for="fullName">Tên đầy đủ</label>
            <span class="text-required">*</span>
            <input type="text" class="form-control" id="fullName" name="full_name">
            <div class="text-danger error-msg" data-name="full_name"></div>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <span class="text-required">*</span>
            <input type="email" class="form-control" id="email" name="email">
            <div class="text-danger error-msg" data-name="email"></div>
          </div>
          {# <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="text" class="form-control" id="phone" name="phone">
            <div class="text-danger error-msg" data-name="phone"></div>
          </div> #}
          <div class="form-group">
            <label for="avatar">Ảnh</label>
            <div class="avatar-preview mb-2" id="avatar_preview">
              <img id="avatar_create_img" src="/default/default-avatar.png" width="120" height="120"></img>
            </div>
            <input type="file" class="form-control" id="avatar_user_create" name="avatar">
          </div>
          <div class="form-group">
            <label for="role">Quyền</label>
            <span class="text-required">*</span>
            <select class="form-control" id="role" name="role">
              <option value="">Chọn quyền</option>
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
            <div class="text-danger error-msg" data-name="role"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
          <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
      </form>
    </div>
  </div>
</div>
