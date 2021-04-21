<!DOCTYPE html>
<html>
	<head>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<title>Role | Wiki Games</title>
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
							<a class="nav-link" href="hero.php">Hero</a>
						</li>
					</ul>
				</div>
			</nav>

			<div class="mt-5">
				<?php
					include 'connection.php';
					$id = mysqli_real_escape_string($config, $_GET['id_type']);
					$sql = mysqli_query($config, "SELECT * FROM type_tb WHERE id_type = '$id'");
					$type = mysqli_fetch_array($sql);
				?>
				<h4>Role : <?php echo $type['name_type'] ?></h4>

				<div class="row">
					<?php
						include 'connection.php';
						$id = mysqli_real_escape_string($config, $_GET['id_type']);
						$hero = mysqli_query($config, "SELECT * FROM hero_tb JOIN type_tb ON type_tb.id_type=hero_tb.id_type WHERE hero_tb.id_type= '$id' ORDER BY hero_tb.id_hero DESC");
						while ($row = mysqli_fetch_array($hero)) {
					?>
					<div class="col-md-3">
						<div class="card embed-responsive">
							<img src="img/<?php echo $row['photo'] ?>" class="card-img-top" style="height: 250px" alt="">
							<div class="card-body">
								<h5 class="card-title"><?php echo $row['name_hero'] ?></h5>
							</div>
						</div>
					</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>

		<!-- jQuery and Bootstrap Bundle -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	</body>
</html>