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

                        if (isset($_SESSION['uname'])) {

                        ?>

                            <a class="nav-link" href="" style="color:#ffffff;"><?php echo $_SESSION['username']; ?><span class="sr-only">(current)</span></a>
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
    <form method="post" action="<?php echo base_url('welcome/allowOrder') ?>">

        <div class="container mt-5 ">
            <div class="row ">


                <?php
                $total = 0;
                foreach ($data1 as $cart) {
                    if ($cart->status == 2) {
                ?>
                        <div class="col-3 col-md-3 col-sm-12 ">
                            <div class="card-group">
                                <div class="card card-column" style="width: 18rem;    margin-bottom: 20px;">
                                    <p>quantity</p>
                                    <?php echo $cart->quantity;

                                    $db_p_id = $cart->proid;

                                    $this->db->select("*");
                                    $this->db->from("products");
                                    $this->db->where("id", $db_p_id);
                                    $sql1 = $this->db->get("");
                                    $ans = $sql1->result();

                                    foreach ($ans as $pro) {
                                    ?>
                                        <img class="card-img-top  " src='<?php echo base_url("$pro->image"); ?>' alt="" width="200" height="200">

                                        <h5 class="card-title"><?php
                                                                echo $pro->title;
                                                                ?></h5>
                                        <p class="lprce"> price <?php
                                                                echo $pro->price * $cart->quantity;

                                                                ?></p>

                                    <?php
                                    }

                                    ?>



                                </div>
                            </div>


                        </div>

                    <?php
                    }
                    ?>
                    <input type="hidden" value="<?php echo $cart->userid; ?>" name="userid">
                <?php
                }
                ?>
            </div>
        </div>

        <button class="btn btn-primary btn-lg">
            Delivered
        </button>
        <hr>
        <h3>Cancelled</h3>
        <div class="container mt-5 ">
            <div class="row ">


                <?php
                $total = 0;
                foreach ($data1 as $cart) {
                    if ($cart->status == 4) {
                ?>
                        <div class="col-3 col-md-3 col-sm-12 ">
                            <div class="card-group">
                                <div class="card card-column" style="width: 18rem;    margin-bottom: 20px;">
                                    <p>quantity</p>
                                    <?php echo $cart->quantity;

                                    $db_p_id = $cart->proid;

                                    $this->db->select("*");
                                    $this->db->from("products");
                                    $this->db->where("id", $db_p_id);
                                    $sql1 = $this->db->get("");
                                    $ans = $sql1->result();

                                    foreach ($ans as $pro) {
                                    ?>
                                        <img class="card-img-top  " src='<?php echo base_url("$pro->image"); ?>' alt="" width="200" height="200">

                                        <h5 class="card-title"><?php
                                                                echo $pro->title;
                                                                ?></h5>
                                        <p class="lprce"> price <?php
                                                                echo $pro->price * $cart->quantity;

                                                                ?></p>

                                    <?php
                                    }

                                    ?>



                                </div>
                            </div>


                        </div>

                    <?php
                    }
                    ?>
                    <input type="hidden" value="<?php echo $cart->userid; ?>" name="userid">
                <?php
                }
                ?>
            </div>
        </div>
        <a href="<?php echo base_url('welcome/clearCancelledorder/')   ?>" class="btn btn-danger" style="    margin: 10px; height:50px">Clear</a>




    </form>
</body>

</html>