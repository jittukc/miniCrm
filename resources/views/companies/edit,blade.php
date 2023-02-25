<!DOCTYPE html>
<html>
<head>
	<title>Create Company</title>
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
	<style>
		body {
			background-color: #F6F7FB;
			font-family: 'Nunito', sans-serif;
			font-size: 16px;
			line-height: 1.5;
			margin: 0;
			padding: 0;
		}

		h1, h2, h3, h4, h5, h6 {
			margin: 0;
		}

		.container {
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
			margin: 50px auto;
			max-width: 800px;
			padding: 50px;
		}

		.form-group {
			margin-bottom: 20px;
		}

		label {
			color: #4E4E4E;
			display: block;
			font-size: 16px;
			font-weight: 600;
			margin-bottom: 10px;
		}

		input[type="text"], input[type="email"], input[type="tel"] {
			background-color: #F6F7FB;
			border: none;
			border-radius: 5px;
			color: #4E4E4E;
			font-size: 16px;
			margin: 0;
			padding: 10px;
			width: 100%;
		}

		.btn {
			background-color: #4E4E4E;
			border: none;
			border-radius: 5px;
			color: #fff;
			cursor: pointer;
			display: inline-block;
			font-size: 16px;
			font-weight: 600;
			padding: 10px 20px;
			text-align: center;
			text-decoration: none;
			transition: background-color 0.3s;
		}

		.btn:hover {
			background-color: #2D2D2D;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Edit Company</h1>
		<form method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" name="name" id="name" required>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" name="email" id="email" required>
			</div>
			<div class="form-group">
				<label for="logo">Logo:</label>
				<input type="file" name="logo" id="logo" accept="image/*" required>
			</div>
			<div class="form-group">
				<label for="website">Website:</label>
				<input type="text" name="website" id="website" required>
			</div>
			<div class="form-group">
				<button type="submit" class="btn">Create Company</button>
			</div>
		</form>
	</div>
</body>
</html>
