<!DOCTYPE html>
<html>
	<head>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<title>Hero Add | Wiki Games</title>
	</head>

	<body>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="index.php">Wiki Games</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="type.php">Type</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="hero.php">Hero</a>
						</li>
					</ul>
				</div>
			</nav>

			<div class="mt-5">
				<div class="card">
					<div class="card-header">
						<a href="hero.php">Back</a>
					</div>
					<div class="card-body">
						<form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
							<div class="row form-group">
								<div class="col-md-2">
									<label>Hero Name</label>
								</div>
								<div class="col-md-10">
									<input type="text" name="name_hero" class="form-control" required>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-2">
									<label>Type</label>
								</div>
								<div class="col-md-10">
									<select class="custom-select" name="id_type" required>
										<option value="">--- Select Type ---</option>
										<?php
											include 'connection.php';
											$type = mysqli_query($config, 'SELECT * FROM type_tb');
											while($row = mysqli_fetch_array($type)) {
										?>
										<option value="<?php echo $row['id_type'] ?>"><?php echo $row['name_type'] ?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-2">
									<label>Photo</label>
								</div>
								<div class="col-md-10">
									<input type="file" name="photo" class="form-control-file" required>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-2"></div>
								<div class="col-md-10">
									<button type="submit" class="btn btn-primary" name="save">Save</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- jQuery and Bootstrap Bundle -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

		<?php
			include 'connection.php';

			if(isset($_POST['save'])) {
				$name_hero	= $_POST['name_hero'];
				$id_type	= $_POST['id_type'];

				$nama = $_FILES['photo']['name'];
				move_uploaded_file($_FILES['photo']['tmp_name'], 'img/'.$nama);

				$save	=	mysqli_query($config, "INSERT INTO hero_tb (name_hero, id_type, photo) VALUE ('$name_hero', '$id_type', '$nama')");

				if($save) {
					header('Location: hero.php?status=sukses');
				} else {
					header('Location: hero.php?status=gagal');
				}
			}
		?>
	</body>
</html>