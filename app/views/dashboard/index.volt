<!-- Dashboard Layout with Sidebar Menu using Bootstrap 4.1 -->
<div class="container-fluid p-0">
  <!-- Header -->
  <nav class="navbar navbar-dark bg-dark mb-0 rounded-0 d-flex justify-content-between align-items-center">
    <span class="navbar-brand mb-0 h1">Phần mềm quản lí</span>
    <a class="text-white nav-link" href="#">
      <i class="fas fa-user"></i> <!-- Thêm FontAwesome nếu muốn icon -->
      Xin chào: {{ userLogged['full_name'] }}
    </a>
  </nav>
  <div class="row no-gutters">
    <!-- Sidebar -->
    <nav class="col-12 col-sm-3 col-md-2 bg-light sidebar py-3" style="min-height:100vh; border-right:1px solid #eee;">
      <div class="font-weight-bold px-3 mb-3" style="font-size:16px;">Quản lí</div>
      <ul class="nav flex-column" id="sidebarMenu">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="fas fa-tachometer-alt"></i> Trang chủ
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-cog"></i> Cài đặt
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('auth/logout') }}">
            <i class="fas fa-sign-out-alt"></i> Đăng xuất
          </a>
        </li>
      </ul>
    </nav>
    <!-- Main Content -->
    <main class="col-12 col-sm-9 col-md-10 px-4 py-4">
      <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-primary px-4" data-toggle="modal" data-target="#createUserModal">Thêm</button>
      </div>
      <h1 class="h3 mb-3">Trang chủ</h1>
      <h2 class="h5 mb-4">Danh sách người dùng</h2>
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Ảnh</th>
              <th>Tên</th>
              <th>Tên đầy đủ</th>
              <th>Email</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td><img src="/images/user1.png" alt="User" width="32" height="32" class="rounded-circle"></td>
              <td>nguyenvanA</td>
              <td>Nguyễn Văn A</td>
              <td>nguyenvana@email.com</td>
              <td>
                <a href="#" class="btn btn-sm btn-info mr-1" title="Xem"><i class="fas fa-eye"></i></a>
                <a href="#" class="btn btn-sm btn-warning mr-1" title="Sửa"><i class="fas fa-edit"></i></a>
                <a href="#" class="btn btn-sm btn-danger" title="Xóa"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            <tr>
              <td>2</td>	
              <td><img src="/images/user2.png" alt="User" width="32" height="32" class="rounded-circle"></td>
              <td>tranthib</td>
              <td>Trần Thị B</td>
              <td>tranthib@email.com</td>
              <td>
                <a href="#" class="btn btn-sm btn-info mr-1" title="Xem"><i class="fas fa-eye"></i></a>
                <a href="#" class="btn btn-sm btn-warning mr-1" title="Sửa"><i class="fas fa-edit"></i></a>
                <a href="#" class="btn btn-sm btn-danger" title="Xóa"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td><img src="/images/user3.png" alt="User" width="32" height="32" class="rounded-circle"></td>
              <td>lequangc</td>
              <td>Lê Quang C</td>
              <td>lequangc@email.com</td>
              <td>
                <a href="#" class="btn btn-sm btn-info mr-1" title="Xem"><i class="fas fa-eye"></i></a>
                <a href="#" class="btn btn-sm btn-warning mr-1" title="Sửa"><i class="fas fa-edit"></i></a>
                <a href="#" class="btn btn-sm btn-danger" title="Xóa"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
	  	{% include 'modals/create-user.volt' %}
    </main>
  </div>
</div>
