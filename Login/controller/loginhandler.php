<?php
// submit
if (isset($_POST['submit'])) {
    // if email,password is set or
    if (isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        // create the variables
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        // email validation

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // if password validate
            if ($password == $password) {
                // query select

                $query = "SELECT * FROM members WHERE email = :email ";
                $handle = $pdo->prepare($query);
                $params = ['email' => $email];
                $handle->execute($params);
                // validation more 
                if ($handle->rowCount() > 0) {
                    $getRow = $handle->fetch(PDO::FETCH_ASSOC);
                    // verify
                    if (password_verify($password, $getRow['pwd'])) {
                        unset($getRow['pwd']);
                        $_SESSION = $getRow;
                        header('location:./index.php');
                        exit();
                    } else {
                        $errors[] = "Wrong Email or Password";
                    }
                } else {
                    $errors[] = "Wrong Email or Password";
                }
            }
        } else {
            $errors[] = "Email address is not valid";
        }
    } else {
        $errors[] = "Email, Password are required";
    }
}