<?php
session_start();
require_once('./controller/config.php');
require_once('./controller/registerhandler.php');

?>


<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body class="bg-dark">


    <div class="row h-100 mt-5 justify-content-center align-items-center">
        <div class="col-md-4 mt-4 pt-2 pb-2 align-self-center border bg-light">
            <h1 class="mx-auto w-25 font-weight-bold">Register</h1>
            <!-- throw in the errors when one does not fill in the fields required -->
            <?php
            if (isset($errors) && count($errors) > 0) {
                foreach ($errors as $error_msg) {
                    echo '<div class="alert alert-danger">' . $error_msg . '</div>';
                }
            }
            // if fields are filled in correctly please send in the session message

            if (isset($success)) {

                echo '<div class="alert alert-success">' . $success . '</div>';
            }
            ?>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="container h-100">
                    <div class="imgcontainer">
                        <img src="https://media.licdn.com/dms/image/D4D0BAQFU8FrTVdh5XQ/company-logo_400_400/0/1666690280149?e=2147483647&v=beta&t=sqN9iUk1T4f77UIYwQh6BGShMVOs-5xL-nyH0tZ56_U"
                            class="avatar" alt="Eplicle">

                    </div>
                    <div class="form-group">
                        <label for="email">First Name:</label>
                        <input type="text" name="first_name" placeholder="Enter First Name" class="form-control"
                            value="<?php echo ($valFirstName ?? '') ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Last Name:</label>
                        <input type="text" name="last_name" placeholder="Enter Last Name" class="form-control"
                            value="<?php echo ($valLastName ?? '') ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" placeholder="Enter Email" class="form-control"
                            value="<?php echo ($valEmail ?? '') ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Password:</label>
                        <input type="password" name="password" placeholder="Enter Password" class="form-control"
                            value="<?php echo ($valPassword ?? '') ?>">
                    </div>
                    <div class="form-group">
					<label for="confirm_password">Confirm Password:</label>
    				<input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control">
					
					</div>

					
					<span class="psw ">Forgot Password? <a href="#">Click Here</a></span>
                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
                    <p class="pt-2"> Already have an account <a href="login.php">Login</a></p>

            </form>
        </div>
    </div>
    </div>
</body>

</html>