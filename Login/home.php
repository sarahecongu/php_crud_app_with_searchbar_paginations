<?php
include('./controller/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <!-- navabar -->
    <div class="container-fluid banner ">
        <div class="row">
            <div class="col-md-12">

                    <nav class="navbar navbar-md ">
                        <div class="navbar-brand">Epicle
                       
                        </div>
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="login.php" class="nav-link">HOME</a>
                            </li>
                            <!-- about -->
                            <li class="nav-item">
                                <a href="#" class="nav-link">ABOUT</a>
                            </li>
                            <!-- CONTACT -->
                            <li class="nav-item">
                                <a href="#" class="nav-link">CONTACT</a>
                            </li>
                            <!-- SERVICES -->
                            <li class="nav-item">
                                <a href="#" class="nav-link">SERVICES</a>
                            </li>
                            <li class="nav-item">
                            <a href="login.php" class="nav-link btn btn-primary">LOGIN</a>  
                            </li>
                            <li class="nav-item ml-1">
                            <a href="register.php" class="nav-link btn btn-success ">SIGNUP</a> 
                            </li>
                        </ul>
                    </nav>
              
            </div>
            <!-- center -->
       <div class="col-md-8 offset-md-2 info">
        <h1 class="text-center">EPICLE</h1>
        <p class="text-center">
        Epicle is a software development company that is aimed at automating 
        business processes for less and affordable prices 
        </p>
        <a href="login.php" class="btn btn-md text-center btn btn-danger">GET STARTED</a>
       </div>
        </div>
    </div>
</body>
</html>