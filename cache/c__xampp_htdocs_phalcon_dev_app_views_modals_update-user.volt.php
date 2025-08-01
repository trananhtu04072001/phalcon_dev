<div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="updateUserModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="updateUserForm" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="updateUserModal">Cập nhật người dùng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
            <span aria-hidden="true">&times;</span>
          </button> 
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Tên đăng nhập</label>
            <span class="text-required">*</span>
            <input type="text" class="form-control" id="edit_name" name="name">
            <div class="text-danger error-msg" data-name="name"></div>
          </div>
          <div class="form-group">
            <label for="fullName">Tên đầy đủ</label>
            <span class="text-required">*</span>
            <input type="text" class="form-control" id="edit_full_Name" name="full_name">
            <div class="text-danger error-msg" data-name="full_name"></div>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <span class="text-required">*</span>
            <input type="email" class="form-control" id="edit_email" name="email">
            <div class="text-danger error-msg" data-name="email"></div>
          </div>
          <div class="form-group">
            <label for="avatar">Ảnh</label>
            <div class="avatar-preview mb-2" id="avatar_preview">
              <img id="avatar_img" src="" width="120" height="120"></img>
            </div>
            <input type="file" class="form-control" id="avatar_user_update" name="avatar">
            <div class="text-danger error-msg" data-name="avatar"></div>
          </div>
          <div class="form-group">
            <label for="role">Quyền</label>
            <span class="text-required">*</span>
            <select class="form-control" id="edit_role" name="role">
              <option value="">Chọn quyền</option>
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
            <div class="text-danger error-msg" data-name="role"></div>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="<?= true ?>" id="auto_reset_password" name="auto_reset_password">
            <label class="form-check-label" for="auto_reset_password">
              Đổi mật khẩu tự động.
            </label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
          <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
      </form>
    </div>
  </div>
</div>
