// Sidebar active state with jQuery
$(function() {
    $('#sidebarMenu li').on('click', function() {
        console.log('123333');
        
        $('#sidebarMenu li').removeClass('active');
        $(this).addClass('active');
    });
});

$(document).ready(function () {
  $('#createUserForm').on('submit', function (e) {
    e.preventDefault();
    var formData = new FormData(this); 
    $.ajax({
      url: 'user/create', // URL xử lý tạo user
      method: 'POST',
      data: formData,
      processData: false,   // không xử lý dữ liệu (do đang dùng FormData)
      contentType: false,   // không đặt Content-Type (để jQuery tự set multipart/form-data)
      success: function (response) {
        alert('Thêm thành công!');
        // $('#createUserModal').modal('hide');
        // location.reload();
        console.log(response);
      },
      error: function (xhr) {
        alert('Có lỗi xảy ra: ' + xhr.responseText);
      }
    });
  });
});
