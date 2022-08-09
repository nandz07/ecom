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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- table jequry sort -->


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin pannel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('welcome/'); ?>">My Shop <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('welcome/adminOrder/'); ?>">Orders</a>
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

                    if (isset($_SESSION['uname'])) {

                    ?>

                        <a class="nav-link" href="<?php echo base_url('welcome/adminLogout'); ?>">Logout<span class="sr-only">(current)</span></a>
                    <?php
                    }
                    ?>

                </li>

            </ul>


        </div>
    </nav>
    <div>
        <table class="table table-striped" id="table_id" class="display">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Featured</th>
                    <th scope="col">operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $std) {

                ?>
                    <tr>

                        <td><?php echo $std->id; ?></td>
                        <td><?php echo $std->title; ?></td>
                        <td><?php echo $std->price; ?></td>
                        <td><?php echo $std->brandname; ?></td>
                        <td><img src="<?php echo base_url($std->image); ?>" alt="" width="50" height="50"></td>
                        <td><?php echo $std->description;  ?></td>
                        <td><?php echo $std->featured; ?></td>

                        <td>
                            <a class="edit" title="Edit" data-toggle="tooltip" href="<?php echo base_url('welcome/edit/') . $std->id; ?>"><i class="material-icons"></i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip" href="<?php echo base_url('welcome/delete/') . $std->id; ?>"><i class="material-icons"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>

                <a class="btn btn-success" title="insert" data-toggle="tooltip" href="<?php echo base_url('welcome/insertView') ?>">Insert New</a>
                

            </tbody>
        </table>
    </div>

</body>

</html>