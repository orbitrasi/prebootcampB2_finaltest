<!DOCTYPE html>
<html>
	<head>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<title>Hero | Wiki Games</title>
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
				<?php if(isset($_GET['status'])): ?>
					<?php if($_GET['status'] == 'sukses') { ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Berhasil</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php } else { ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Gagal</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php } ?>
				<?php endif; ?>

				<div class="card">
					<div class="card-header">
						<a href="hero_add.php" class="btn btn-primary">Add Hero</a>
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Hero ID</th>
									<th>Photo</th>
									<th>Hero Name</th>
									<th>Type</th>
									<th>Option</th>
								</tr>
							</thead>
							<tbody>
								<?php
									include 'connection.php';
									$hero = mysqli_query($config, 'SELECT * FROM hero_tb JOIN type_tb ON type_tb.id_type=hero_tb.id_type');
									while ($row = mysqli_fetch_array($hero)) {
								?>
								<tr>
									<td><?php echo $row['id_hero'] ?></td>
									<td><img src="img/<?php echo $row['photo'] ?>" width="100px"></td>
									<td><?php echo $row['name_hero'] ?></td>
									<td><?php echo $row['name_type'] ?></td>
									<td align="center">
										<a href="hero_edit.php?id_hero=<?php echo $row['id_hero'] ?>" class="btn btn-warning">Edit</a>
										<a onclick="if(confirm('Are You Sure')){ location.href='hero_delete.php?id_hero=<?php echo $row['id_hero']; ?>' }" class="btn btn-danger">Delete</a>
									</td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<!-- jQuery and Bootstrap Bundle -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	</body>
</html>