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
        toastr.success('Thêm thành công!');
        $('#createUserModal').modal('hide');
        setTimeout(function () {
            location.reload();
        }, 2000);
      },
      error: function (xhr) {
        try {
          const res = JSON.parse(xhr.responseText);
          if (res.errors) {
            for (let key in res.errors) {
              $(`.error-msg[data-name="${key}"]`).text(res.errors[key]);
            }
          } else {
            alert('Lỗi: ' + res.message || 'Không rõ lỗi');
          }
        } catch (e) {
          console.error("Không parse được JSON:", e);
          console.log(xhr.responseText);
        }
      }
    });
  });

  let user_edit_id;
  $(".btn-edit-user").on("click", function() {
    user_edit_id = $(this).data('id');
    $('#edit_name').val($(this).data('name'));
    $('#edit_full_Name').val($(this).data('fullName'));
    $('#edit_email').val($(this).data('email'));
    $('#edit_role').val($(this).data('role'));
    $("#updateUserModal").modal("show");
  });

    $('#updateUserForm').on('submit', function (e) {
    e.preventDefault();
    var formData = new FormData(this); 
    $.ajax({
      url: `user/update/${user_edit_id}`, // URL xử lý cập nhật user
      method: 'POST',
      data: formData,
      processData: false,   // không xử lý dữ liệu (do đang dùng FormData)
      contentType: false,   // không đặt Content-Type (để jQuery tự set multipart/form-data)
      success: function (response) {
        toastr.success('Cập nhật thành công');
        $('#updateUserModal').modal('hide');
        setTimeout(function () {
          location.reload();
        }, 2000);
      },
      error: function (xhr) {
        try {
          const res = JSON.parse(xhr.responseText);
          if (res.errors) {
            for (let key in res.errors) {
              $(`.error-msg[data-name="${key}"]`).text(res.errors[key]);
            }
          } else {
            alert('Lỗi: ' + res.message || 'Không rõ lỗi');
          }
        } catch (e) {
          console.error("Không parse được JSON:", e);
          console.log(xhr.responseText);
        }
      }
    });
  });
});
