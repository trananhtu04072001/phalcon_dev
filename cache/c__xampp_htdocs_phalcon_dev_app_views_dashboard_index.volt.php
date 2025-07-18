<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Trang chủ</title>
        <link rel="stylesheet" href="<?php echo $this->url->get('css/app.css')?>"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->url->get('img/favicon.ico')?>"/>
    </head>
    <body>
        <!-- Dashboard Layout with Sidebar Menu using Bootstrap 4.1 -->
        <div class="container-fluid p-0">
        <!-- Header -->
<nav class="navbar navbar-dark bg-dark mb-0 rounded-0 d-flex justify-content-between align-items-center">
    <span class="navbar-brand mb-0 h1">Phần mềm quản lí</span>
    <a class="text-white nav-link" href="#">
    <i class="fas fa-user"></i> <!-- Thêm FontAwesome nếu muốn icon -->
    Xin chào: <?= $userLogged['full_name'] ?>
    </a>
</nav>
        <div class="row no-gutters">
            <!-- Sidebar -->
<nav class="col-12 col-sm-3 col-md-2 bg-light sidebar py-3" style="min-height:100vh; border-right:1px solid #eee;">
    <div class="font-weight-bold px-3 mb-3" style="font-size:16px;">Quản lí</div>
    <ul class="nav flex-column" id="sidebarMenu">
        <li class="nav-item active">
        <a class="nav-link" href="<?= $this->url->get('dashboard') ?>">
            <i class="fas fa-tachometer-alt"></i> Trang chủ
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= $this->url->get('dashboard/updateProfile') ?>">
            <i class="fas fa-cog"></i> Cài đặt
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= $this->url->get('auth/logout') ?>">
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
					<th class="text-center">Ảnh</th>
					<th>Tên</th>
					<th>Tên đầy đủ</th>
					<th>Email</th>
					<th class="text-center">Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<?php $v35149773421iterated = false; ?><?php foreach ($users as $user) { ?><?php $v35149773421iterated = true; ?>
					<tr>
						<td><?= $user->id ?></td>
						<td class="text-center">
							<img src="<?= $user->avatar ?>" alt="User" width="60" height="60" class="rounded">
						</td>
						<td><?= $user->name ?></td>
						<td><?= $user->full_name ?></td>
						<td><?= $user->email ?></td>
						<td class="text-center">
							<a href="#" class="btn btn-sm btn-info mr-1" title="Xem">
								Xem
							</a>
							<a href="#" class="btn btn-sm btn-warning mr-1 btn-edit-user" title="Sửa" 
							data-id="<?= $user->id ?>" data-name="<?= $user->name ?>" data-full-name="<?= $user->full_name ?>"
							data-email="<?= $user->email ?>" data-role="<?= $user->role ?>">
								Sửa
							</a>
							
						</td>
					</tr>
				<?php } if (!$v35149773421iterated) { ?>
					<tr>
						<td colspan="6">Không có người dùng nào.</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
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
            <input type="text" class="form-control" id="name" name="name">
            <div class="text-danger error-msg" data-name="name"></div>
          </div>
          <div class="form-group">
            <label for="fullName">Tên đầy đủ</label>
            <input type="text" class="form-control" id="fullName" name="full_name">
            <div class="text-danger error-msg" data-name="full_name"></div>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
            <div class="text-danger error-msg" data-name="email"></div>
          </div>
          
          <div class="form-group">
            <label for="avatar">Ảnh</label>
            <input type="file" class="form-control" id="avatar" name="avatar">
          </div>
          <div class="form-group">
            <label for="role">Quyền</label>
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
          <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
      </form>
    </div>
  </div>
</div>

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


            </main>
        </div>
        </div>
        <!-- jQuery first, then Popper.js, and then Bootstrap's JavaScript -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="<?php echo $this->url->get('js/app.js')?>" crossorigin="anonymous"></script>
    </body>
</html>
