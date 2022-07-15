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
    <a class="navbar-brand" href="#">BRQ</a>
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
            Products
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo base_url('welcome/laptop/'); ?>">Laptop</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url('welcome/mobile/'); ?>">Mobile Phone</a>


          </div>
        </li>

      </ul>


    </div>
  </nav>
  <form method="post" action="">
    <div class="col-md-2 " style="
    margin: auto;
    padding-top: 20px;
    display: flex;">
      <div class="col-md-8">
        <div class="row">
          <h2 class="text-center">Products</h2>
          <?php
          foreach ($data as $products)
          ?>


          <?php
        echo $products->title;
          ?>

          <div class="col-mod-5">
            <h4 style="
    color: crimson;
    font-family: cursive;"><?php
                            echo $products->title;
                            ?></h4>
            <img src='<?php echo base_url("$products->image"); ?>' alt="" width="200" height="200">
          </div>
          <p class="lprce">Rs <?php
                              echo $products->price;
                              ?> </p>
          <input type="hidden" name="id" value=<?php

                                                echo $products->id;

                                                ?>>
          <h4><?php
              echo $products->title;
              ?></h4>
          <p class="details" style="font-family: monospace;"><?php
                              echo $products->description;
                              ?> </p>
          <button class="example"><a href="<?php echo base_url() . 'welcome/'  ?>">Home</button>

        </div>
      </div>

    </div>
  </form>
</body>

</html>