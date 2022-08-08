<!DOCTYPE html>
<html lang="en">

<head>
	<title>BRQ</title>
	<link rel="stylesheet" href='<?php echo base_url("css/bootstrap.min.css"); ?>' />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src='<?php echo base_url("js/bootstrap.min.js"); ?>'></script>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
        .btn:hover{
            
            color:black;
			transition: 0.5s all ease;
			box-shadow: inset 200px 0 0 0 whitesmoke;
			border: none;
			
        }
    </style>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-info">
		<a class="navbar-brand" href="<?php echo base_url('welcome/admin'); ?>">BRQ</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo base_url('welcome/'); ?>">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Products</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo base_url('welcome/laptop/'); ?>">Laptop</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?php echo base_url('welcome/mobile/'); ?>">Mobile Phone</a>
					</div>
				</li>
				<li class="nav-item active">
					<?php

					if (isset($_SESSION['username'])) {

					?>

						<a class="nav-link" href="<?php echo base_url('welcome/userLogout'); ?>">Logout<span class="sr-only">(current)</span></a>
					<?php
					}
					?>

				</li>
				<li class="nav-item active">
					<?php

					if (isset($_SESSION['username'])) {

					?>

						<a class="nav-link" href="<?php echo base_url('welcome/cartHistory'); ?>">Cart History<span class="sr-only">(current)</span></a>
					<?php
					}
					?>

				</li>
				<li class="nav-item active">


					<a class="nav-link" href="<?php echo base_url('welcome/cartDetails'); ?>">Cart<span class="sr-only">(current)</span></a>


				</li>

			</ul>

			<form class="form-inline my-2 my-lg-0">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active dropdown">
						<?php

						if (isset($_SESSION['username'])) {

						?>

							<a class="nav-link" href="" style="color:white;"><?php echo $_SESSION['username']; ?><span class="sr-only">(current)</span></a>
						<?php
						} else {
						?>
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Login</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?php $flag = 1;
																echo base_url('welcome/login/') . $flag; ?>">Log in </a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?php echo base_url('welcome/signup/'); ?>">sign up</a>
							</div>
						<?php } ?>
					</li>
				</ul>

			</form>

		</div>
	</nav>
	<form method="post" action="">
		<div class="container mt-5 ">
			<div class="row ">


				<?php
				foreach ($data as $products) {
				?>
					<div class="col-3 col-md-3">
						<div class="card-group">
							<div class="card card-column" style="width: 18rem;    margin-bottom: 20px;">
								<img class="card-img-top  " src='<?php echo base_url("$products->image"); ?>' alt="" width="200" height="200">

								<h5 class="card-title"><?php
														echo $products->title;
														?></h5>
								<p class="lprce">Rs <?php
													echo $products->price;
													?></p>

								<a href="<?php echo base_url('welcome/details/')  . $products->id ?>" class="btn btn-primary" style="    margin: 10px;">more</a>





								<a href="<?php echo base_url('welcome/addCart/')  . $products->id ?>" class="btn btn-success" style="    margin: 10px;">Add to cart</a>

							</div>
						</div>


					</div>
				<?php
				}
				?>
			</div>
		</div>
	</form>
</body>

</html>