<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {    
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}	
</style>
</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
    <div id="success_message"></div>
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Companies <b></b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Companies</span></a>
											
					</div>
				</div>
			</div>

			<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Logo</th>
					<th>Website</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($companies as $company)
					<tr>
						<td>{{ $company->name }}</td>
						<td>{{ $company->email }}</td>
						<td>
							@if ($company->logo)
								<img src="{{ asset('storage/'.$company->logo) }}" alt="{{ $company->name }} Logo" width="100">
							@else
								No logo
							@endif
						</td>
						<td>{{ $company->website }}</td>
						<td>
							<a href="{{ route('companies.show', $company) }}" class="btn">View</a>
							<a href="#addEmployeeModal{{ $company->id }}" class="btn" data-toggle="modal">Edit</a>
							<form action="{{ route('companies.destroy', $company) }}" method="POST" style="display: inline-block">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
							</form>
						</td>
					</tr>

					<div id="addEmployeeModal{{ $company->id }}" class="modal fade">
	<div class="modal-dialog">
        
		<div class="modal-content">
        <ul id="saveform_errList"></ul>
		<form method="post" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data">
            	@csrf
				@method('PUT')
				<div class="modal-header">						
					<h4 class="modal-title">Edit Companies</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">	
                <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $company->email }}" required>
        </div>
        <div class="form-group">
            <label for="logo">Logo:</label>
            <input type="file" name="logo" id="logo" accept="image/*" class="form-control">
        </div>
        <div class="form-group">
            <label for="website">Website:</label>
            <input type="text" name="website" id="website" class="form-control" value="{{ $company->website }}" required>
        </div>
			
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="SAVE">
		
				</div>
			</form>
		</div>
	</div>
</div>
				@endforeach
			</tbody>
		</table>
	   
			
		</div>
	</div>        
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
        
		<div class="modal-content">
        <ul id="saveform_errList"></ul>
		<form method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data">
            	@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Add Companies</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">	
                <div class="form-group">
				<label for="name">Name:</label>
				<input type="text" name="name" id="name"  class="name form-control" required>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" name="email" id="email" class="name form-control" required>
			</div>
			<div class="form-group">
				<label for="logo">Logo:</label>
				<input type="file" name="logo" id="logo" accept="image/*" class="name form-control" required>
			</div>
			<div class="form-group">
				<label for="website">Website:</label>
				<input type="text" name="website" id="website" class="name form-control" required>
			</div>
			
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Create Company">
		
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <ul id="updateform_errList"></ul>
			<form id="edit_form">
				<div class="modal-header">
                    <input type="hidden" id="edit_product_id">
                <ul id="updateform_errList"></ul>						
					<h4 class="modal-title">Edit Product</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" id="edit_product_name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>SKU</label>
						<input type="text" id="edit_product_sku" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="number" class="form-control" id="edit_product_price" required>
					</div>
					<div class="form-group">
						<label>Prev Category</label>
						<input type="text" class="form-control" id="edit_product_category_prev" readonly>
					</div>
					
					 <div class="form-group">
						<label>Category</label>
						<select class="category form-control" id="edit_product_category"require>
                            <!-- <option value="" id="edit_cat">SELECT CATEGORY</option> -->
                           
                        </select>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info update_product" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Product</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
                    <input type="hidden" id="delete_product_id">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger confirm_delete_product" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>