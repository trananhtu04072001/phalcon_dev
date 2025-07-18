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
            <input type="text" class="form-control" id="edit_name" name="name">
            <div class="text-danger error-msg" data-name="name"></div>
          </div>
          <div class="form-group">
            <label for="fullName">Tên đầy đủ</label>
            <input type="text" class="form-control" id="edit_full_Name" name="full_name">
            <div class="text-danger error-msg" data-name="full_name"></div>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="edit_email" name="email">
            <div class="text-danger error-msg" data-name="email"></div>
          </div>
          {# <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="text" class="form-control" id="phone" name="phone">
            <div class="text-danger error-msg" data-name="phone"></div>
          </div> #}
          <div class="form-group">
            <label for="avatar">Ảnh</label>
            <input type="file" class="form-control" id="avatar" name="avatar">
          </div>
          <div class="form-group">
            <label for="role">Quyền</label>
            <select class="form-control" id="edit_role" name="role">
              <option value="">Chọn quyền</option>
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
            <div class="text-danger error-msg" data-name="role"></div>
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
