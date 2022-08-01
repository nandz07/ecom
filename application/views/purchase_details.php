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

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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

                        <a class="nav-link" href="<?php echo base_url('welcome/cartDetails'); ?>">Cart<span class="sr-only">(current)</span></a>
                    <?php
                    }
                    ?>

                </li>

            </ul>

            <form class="form-inline my-2 my-lg-0">
                <ul>
                    <li class="nav-item dropdown">
                        <?php

                        if (isset($_SESSION['username'])) {

                        ?>

                            <a class="nav-link" href=""><?php echo $_SESSION['username']; ?><span class="sr-only">(current)</span></a>
                        <?php
                        } else {
                        ?>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Login</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo base_url('welcome/login/'); ?>">Log in </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url('welcome/signup/'); ?>">sign up</a>
                            </div>
                        <?php } ?>
                    </li>
                </ul>

            </form>

        </div>
    </nav>
    <form method="post" action="<?php echo base_url('welcome/placeOrder'); ?>">
    <section class="vh-100 gradient-custom">
      <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-12 col-lg-9 col-xl-7">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
              <div class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5" style="color:brown;">Place Order</h3>
                It's quick and easy !
                <hr>
                <form>

                  <div class="row">
                    <div class="col-md-6 mb-4">

                      <div class="form-outline">
                        <input type="text" name="firstName" id="firstName" class="form-control form-control-lg" value="<?php echo($_SESSION['username']) ;?>" />
                        <label class="form-label" for="firstName" >Name</label>
                      </div>


                    </div>
                    <div class="col-md-6 mb-4">

                      <div class="form-outline">
                        <input type="Address" name="address" id="password" class="form-control form-control-lg" />
                        <label class="form-label" for="Address">Address</label>
                      </div>


                    </div>

                  </div>

                  

                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <input type="email" name="emailAddress" id="emailAddress" class="form-control form-control-lg" />
                        <label class="form-label" for="emailAddress">Email</label>
                      </div>

                    </div>
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <input type="tel" name="phoneNumber" id="phoneNumber" class="form-control form-control-lg" />
                        <label class="form-label" for="phoneNumber">Phone Number</label>
                      </div>

                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <input type="text" name="total" id="total" class="form-control form-control-lg" value="<?php echo ($hai) ;?>" />
                        <label class="form-label" for="total" >Grand Total</label>
                      </div>

                    </div>
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <input type="text" name="payment" id="payment" class="form-control form-control-lg" />
                        <label class="form-label" for="phoneNumber">payment method</label>
                      </div>

                    </div>

                  </div>

                  

                  <div class="mt-4 pt-2">
                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>
</body>

</html>