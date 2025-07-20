{% extends 'layouts/main.volt' %}
{% block title %}Trang chủ{% endblock %}
{% block content %}
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
				{% for user in users %}
					<tr>
						<td>{{ user.id }}</td>
						<td class="text-center">
							<img src="{{ user.avatar }}" alt="User" width="60" height="60" class="rounded">
						</td>
						<td>{{ user.name }}</td>
						<td>{{ user.full_name }}</td>
						<td>{{ user.email }}</td>
						<td class="text-center">
							<a href="#" class="btn btn-sm btn-info mr-1 btn-show-user" title="Xem"
							data-id="{{ user.id }}" data-name="{{ user.name }}" data-full-name="{{ user.full_name }}"
							data-email="{{ user.email }}" data-role="{{ user.role }}" data-avatar="{{ user.avatar }}">
								Xem
							</a>
							<a href="#" class="btn btn-sm btn-warning mr-1 btn-edit-user" title="Sửa" 
							data-id="{{ user.id }}" data-name="{{ user.name }}" data-full-name="{{ user.full_name }}"
							data-email="{{ user.email }}" data-role="{{ user.role }}">
								Sửa
							</a>
							{# <a href="#" class="btn btn-sm btn-danger" title="Xóa">
								Xóa
							</a> #}
						</td>
					</tr>
				{% else %}
					<tr>
						<td colspan="6">Không có người dùng nào.</td>
					</tr>
				{% endfor %}
			</tbody>
		</table>
	</div>
	{% include 'modals/create-user.volt' %}
	{% include 'modals/update-user.volt' %}
	{% include 'modals/show-user.volt' %}
{% endblock %}
