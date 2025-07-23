// Sidebar active state with jQuery
$(function() {
    $('#sidebarMenu li').on('click', function() {
        $('#sidebarMenu li').removeClass('active');
        $(this).addClass('active');
    });
});

$(document).ready(function () {
   // Lắng nghe sự kiện nhập liệu ở tất cả input, textarea, select
  $('#registerForm, #loginForm').on('input change', 'input, textarea, select', function () {
    var fieldName = $(this).attr('name');    
    if (fieldName) {
      $(`.error-msg[data-name="${fieldName}"]`).text('');
    }
  });

  $('body').on('input change', '#createUserForm input, #createUserForm textarea, #createUserForm select, #updateUserForm input, #updateUserForm textarea, #updateUserForm select', function () {
    var fieldName = $(this).attr('name');
    if (fieldName) {
      $(`.error-msg[data-name="${fieldName}"]`).text('');
    }
  });

  // Register account admin
  $('#registerForm').on('submit', function (e) {
    e.preventDefault();
    var formData = new FormData(this); 
    $.ajax({
      url: '/auth/register',
      method: 'POST',
      data: formData,
      processData: false,   // không xử lý dữ liệu (do đang dùng FormData)
      contentType: false,   // không đặt Content-Type (để jQuery tự set multipart/form-data)
      success: function (response) {
        toastr.success(response.message);
        setTimeout(function () {
          window.location.href = response.redirect;
        }, 1500);
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

  // Login account Admin
  $('#loginForm').on('submit', function (e) {
    e.preventDefault();
    var formData = new FormData(this); 
    $.ajax({
      url: '/auth/login',
      method: 'POST',
      data: formData,
      processData: false,   // không xử lý dữ liệu (do đang dùng FormData)
      contentType: false,   // không đặt Content-Type (để jQuery tự set multipart/form-data)
      success: function (response) {
        toastr.success(response.message);
        setTimeout(function () {
          window.location.href = response.redirect || '/dashboard';
        }, 1500);
      },
      error: function (xhr) {
        try {
          const res = JSON.parse(xhr.responseText);
          if (res.errors) {
            for (let key in res.errors) {
              $(`.error-msg[data-name="${key}"]`).text(res.errors[key]);
            }
          } else {
            toastr.error('Lỗi: ' + res.message || 'Không rõ lỗi');  
          }
        } catch (e) {
          console.error("Không parse được JSON:", e);
          console.log(xhr.responseText);
        }
      }
    });
  });

  $('#createUserForm').on('submit', function (e) {
    e.preventDefault();
    var formData = new FormData(this); 
    $.ajax({
      url: '/user/create', // URL xử lý tạo user
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
    $('#avatar_img').attr('src', '/'+$(this).data('avatar'));
    $("#updateUserModal").modal("show");
  });

  $('#updateUserForm').on('submit', function (e) {
    e.preventDefault();
    var formData = new FormData(this); 
    $.ajax({
      url: `/user/update/${user_edit_id}`, // URL xử lý cập nhật user
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

    $('#updateProfileForm').on('submit', function (e) {
    e.preventDefault();
    var formData = new FormData(this); 
    $.ajax({
      url: `/dashboard/updateProfile`, // URL xử lý cập nhật profile
      method: 'POST',
      data: formData,
      processData: false,   // không xử lý dữ liệu (do đang dùng FormData)
      contentType: false,   // không đặt Content-Type (để jQuery tự set multipart/form-data)
      success: function (response) {
        toastr.success(response.message);
        setTimeout(function () {
          window.location.href = response.redirect || '/dashboard/updateProfile';
        }, 1500);
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

  $('.btn-show-user').on("click", function() {
    $('#detail_name').text($(this).data('name'));
    $('#detail_full_name').text($(this).data('fullName'));
    $('#detail_email').text($(this).data('email'));
    $('#detail_role').text($(this).data('role'));
    $('#detail_avatar').attr('src', '/'+$(this).data('avatar'));
    $("#userDetailModal").modal("show");
  });

  $('#avatar_profile').on('change', function (e) {
      const file = e.target.files[0];
      if (file && file.type.startsWith('image/')) {
          const reader = new FileReader();
          reader.onload = function (e) {
              $('#avatar_img').attr('src', e.target.result);
          }
          reader.readAsDataURL(file);
      } else {
          alert("Vui lòng chọn tệp hình ảnh hợp lệ.");
      }
  });

  $('#avatar_user_update').on('change', function (e) {
    const file = e.target.files[0];
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (e) {
            $('#avatar_img').attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
    } else {
        alert("Vui lòng chọn tệp hình ảnh hợp lệ.");
    }
  });

  $('#avatar_user_create').on('change', function (e) {
    const file = e.target.files[0];
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (e) {
            $('#avatar_create_img').attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
    } else {
        alert("Vui lòng chọn tệp hình ảnh hợp lệ.");
    }
  });

  setTimeout(function () {
    $('.alert-success-custom, .alert-danger-custom').fadeOut(500, function () {
        $(this).remove();
    });
  }, 3000);
});
