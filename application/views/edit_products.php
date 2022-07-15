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


            </ul>

        </div>
    </nav>
    <form action="<?php echo base_url('welcome/editResult'); ?>" method="post" enctype="multipart/form-data">
        <div>

            <table>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" value="<?php foreach ($data as $std) {
                                                                    echo $std->title;
                                                                } ?>"></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="text" name="price" value="<?php foreach ($data as $std) {
                                                                    echo $std->price;
                                                                } ?>"></td>
                </tr>
                <tr>
                    <td>Brand Name</td>
                    <td><input type="text" name="brandname" value="<?php foreach ($data as $std) {
                                                                    echo $std->brandname;
                                                                } ?>"></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><img src="<?php foreach ($data as $std) {
                                        echo base_url($std->image);
                                    } ?>" alt="" width="100" height="100">
                                    <input type="hidden" name="image"value="<?php foreach ($data as $std) {
                                       echo $std->image;
                                    } ?>">
                                    <input type="file" name="myfile"></td>
                    
                    
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="description" rows="4" cols="50" value="<?php foreach ($data as $std) {
                                                                                    echo $std->brandname;
                                                                                } ?>"><?php foreach ($data as $std) {
                                                                                        echo $std->description;
                                                                                    } ?></textarea></td>
                </tr>
                <tr>
                    <td>Featured</td>
                    <td><input type="text" name="featured" value="<?php foreach ($data as $std) {
                                                                    echo $std->featured;
                                                                } ?>"></td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php foreach ($data as $std) {
                                                                    echo $std->id;
                                                                } ?>">
                    </td>
                </tr>

                <tr>
                    <td>
                    <input type="submit" value="make changes">
                    </td>
                    <td>
                    
                    </td>
                    <td>
                    
                    </td>
                </tr>                                                
            </table>
            
        </div>
        
    </form>

</body>

</html>