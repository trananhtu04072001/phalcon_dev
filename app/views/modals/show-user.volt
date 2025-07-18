<div class="modal fade" id="userDetailModal" role="dialog" aria-labelledby="userDetailModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userDetailLabel">Chi tiết người dùng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
            <span aria-hidden="true">&times;</span>
        </button> 
      </div>
      <div class="modal-body">
        <p><strong>Tên:</strong> <span id="detail_name"></span></p>
        <p><strong>Họ tên:</strong> <span id="detail_full_name"></span></p>
        <p><strong>Email:</strong> <span id="detail_email"></span></p>
        {# <p><strong>Điện thoại:</strong> <span id="detail_phone"></span></p> #}
        <p><strong>Quyền:</strong> <span id="detail_role"></span></p>
        <p><strong>Ảnh đại diện:</strong><br>
          <img id="detail_avatar" src="" class="img-thumbnail" width="100">
        </p>
      </div>
    </div>
  </div>
</div>