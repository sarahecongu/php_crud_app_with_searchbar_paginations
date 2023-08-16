<?php
session_start();
require_once('./controller/config.php');
require_once('./controller/loginhandler.php')



?>

<!doctype html>
<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/styles.css">
</head>

<body class="bg-dark">

        
	<div class="container h-100  ">
		<div class="row h-100 mt-3 justify-content-center align-items-center">
			<div class="col-md-4 mt-4 pt-4 pb-2 align-self-center border bg-light">
				<h1 class="mx-auto w-25 font-weight-bold">Login</h1>
				<?php
				if (isset($errors) && count($errors) > 0) {
					foreach ($errors as $error_msg) {
						echo '<div class="alert alert-danger">' . $error_msg . '</div>';
					}
				}
				?>
				<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div class="imgcontainer">
						<img src="https://media.licdn.com/dms/image/D4D0BAQFU8FrTVdh5XQ/company-logo_400_400/0/1666690280149?e=2147483647&v=beta&t=sqN9iUk1T4f77UIYwQh6BGShMVOs-5xL-nyH0tZ56_U"
							class="avatar" alt="Eplicle">

					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" name="email" placeholder="Enter Email" class="form-control">
					</div>
					
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" name="password" placeholder="Enter Password" class="form-control">
					</div>
					
					<div class="container md-3 mt-5 pt-1 ">
						<button type="submit"name="submit" class="btn btn-primary">Login</button>
						<span class="account float-right">No Account? <a href="register.php">Register</a></span>
					</div>


					</span>

				</form>
			</div>
		</div>
	</div>
</body>

</html>