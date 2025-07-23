<div class="modal fade" id="userDetailModal" tabindex="-1" role="dialog" aria-labelledby="userDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content shadow-lg border-0">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="userDetailModalLabel">👤 Chi tiết người dùng</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Đóng">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4">
        <div class="row align-items-center">
          <div class="col-md-4 text-center mb-3 mb-md-0">
            <img id="detail_avatar" src="/images/default-avatar.png" alt="Avatar" class="img-fluid rounded shadow" style="max-height: 200px;">
          </div>
          <div class="col-md-8">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><strong>👤 Tên:</strong> <span id="detail_name"></span></li>
              <li class="list-group-item"><strong>👤 Họ tên:</strong> <span id="detail_full_name"></span></li>
              <li class="list-group-item"><strong>📧 Email:</strong> <span id="detail_email"></span></li>
              <li class="list-group-item"><strong>🛡️ Quyền:</strong> <span id="detail_role"></span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>