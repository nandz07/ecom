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
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<style>
		
		.btn:hover {


			transition: 0.5s all ease;
			box-shadow: inset 200px 0 0 0 whitesmoke;
			border: none;
			color: green;


		}

		.p1:hover {
			color: blue;
		}

		.nav-link:hover {

			transition: 0.5s all ease;
			border-bottom: 3px solid #f33f3f;
		}

		.card-group:hover {
			transform: scale(1.05);
			transition: 0.3s all ease;
			color: red;

		}

		.card-group.op1:hover {

			color: blue;
		}

		/* .navbar{
			height: 60px;
		} */
	</style>
</head>

<body>
	<div class="start">

		<header>
			<nav class="navbar navbar-expand-lg navbar-dark bg-info">
				<a class="navbar-brand" href="<?php echo base_url('welcome/admin'); ?>">BRQ</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="<?php echo base_url('welcome/'); ?>"><i class="fa fa-home"></i> <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Products </a>
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


							<a class="nav-link" href="<?php echo base_url('welcome/cartDetails'); ?>"><span><i class="fa fa-shopping-cart"></i></span></a>


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
										<i class='far fas fa-user-alt' style='font-size:24px'></i></a>
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
		</header>

		<!-- <section>
		<div class="banner" style="width: auto;">
		<img src="<-?php echo base_url("banner-img/banner-2-mack.jpg"); ?>" alt="" style="    width: -webkit-fill-available;    position: fixed;">		
		</div>
	</section> -->
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

									<a href="<?php echo base_url('welcome/details/')  . $products->id ?>" class="btn btn-primary" style="    margin: 10px; display:block;">
										<p class="p1" style="margin: 0; padding:0%;">more</p>
									</a>





									<a href="<?php echo base_url('welcome/addCart/')  . $products->id ?>" class="btn btn-success" style="    margin: 10px; display:block;">
										<p class="p2" style="margin: 0; padding:0%;">Add to <span><i class="fa fa-shopping-cart"></i></p></span>
									</a>

								</div>
							</div>


						</div>
					<?php
					}
					?>
				</div>
			</div>
			<div class="progress">
				<div class="determinate" style="width: 70%">

				</div>
			</div>

		</form>
	</div>
</body>

</html>