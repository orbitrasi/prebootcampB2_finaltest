<!DOCTYPE html>
<html>
	<head>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<title>Hero Edit | Wiki Games</title>
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
						<?php
							include 'connection.php';
							$id = mysqli_real_escape_string($config, $_GET['id_hero']);
							$sql = mysqli_query($config, "SELECT * FROM hero_tb JOIN type_tb ON type_tb.id_type=hero_tb.id_type WHERE hero_tb.id_hero = '$id'");
							$hero = mysqli_fetch_array($sql);
						?>
						<form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
							<div class="row form-group">
								<div class="col-md-2">
									<label>Hero Name</label>
								</div>
								<div class="col-md-10">
									<input type="hidden" name="id_hero" value="<?php echo $hero['id_hero'] ?>">
									<input type="text" name="name_hero" class="form-control" value="<?php echo $hero['name_hero'] ?>" required>
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
										<option value="<?php echo $row['id_type'] ?>"
											<?php if($row['id_type'] == $hero['id_type']){ ?>
												selected
											<?php } ?>>
											<?php echo $row['name_type'] ?></option>
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
									<input type="file" name="photo" class="form-control-file">
									<input type="hidden" name="hidden_photo" value="<?php echo $hero['photo'] ?>">
									<img src="img/<?php echo $hero['photo'] ?>" width="70px">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-2"></div>
								<div class="col-md-10">
									<button type="submit" class="btn btn-primary" name="update">Update</button>
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

			if(isset($_POST['update'])) {
				$id_hero 	= $_POST['id_hero'];
				$name_hero	= $_POST['name_hero'];
				$id_type	= $_POST['id_type'];
				$photo 		= $_FILES['photo']['name'];
				$old_photo	= $_POST['hidden_photo'];

				if($photo != "") {
					$nama = $_FILES['photo']['name'];
					move_uploaded_file($_FILES['photo']['tmp_name'], 'img/'.$nama);
					unlink("img/".$old_photo);

					$update = mysqli_query($config, "UPDATE hero_tb SET name_hero='$name_hero', id_type='$id_type', photo='$nama' WHERE id_hero='$id_hero'");
				} else {
					$update = mysqli_query($config, "UPDATE hero_tb SET name_hero='$name_hero', id_type='$id_type' WHERE id_hero='$id_hero'");
				}

				if($update) {
					header('Location: hero.php?status=sukses');
				} else {
					header('Location: hero.php?status=gagal');
				}
			}
		?>
	</body>
</html>