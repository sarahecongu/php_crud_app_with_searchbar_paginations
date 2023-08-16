<?php
include('./controller/config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4" >
                <div class="card">
                    <div class="card-header">
                        <a href="index.php" class="btn btn-danger">BACK</a>

                    </div>
                    <div class="card-body">
                      <form action="./controller/formhandler.inc.php" method="POST">
                        <div class="mb-3">
                            <label for="firstname">firstname:</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>
                        <!-- lastname -->
                        <div class="mb-3">
                            <label for="lastname">lastname:</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                        
                        <!--email  -->
                        <div class="mb-3">
                            <label for="email">email:</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password">password:</label>
                            <input type="password" name="pwd" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="save" class="btn btn-primary">Save Employee</button>
                        </div>

                      </form>  
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>