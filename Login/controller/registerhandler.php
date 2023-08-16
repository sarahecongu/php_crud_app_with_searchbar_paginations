<?php
// for the submit
if (isset($_POST['submit'])) {
    // for the database
    if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['confirm_password']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['password'])&& !empty($_POST['confirm_password'])) {
        $firstName = trim($_POST['first_name']);
        $lastName = trim($_POST['last_name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $confirmPassword = trim($_POST['confirm_password']);

        $options = array("cost" => 5);
        $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
        $date = date('Y-m-d H:i:s');
// email validation

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // FETCH FROM THE DATABASE 
            $query = 'SELECT * FROM members WHERE email = :email';
            $stmt = $pdo->prepare($query);
            $p = ['email' => $email];
            $stmt->execute($p);
// check row count
            if ($stmt->rowCount() == 0) {
                $query = "INSERT INTO members (first_name, last_name, email, pwd, created_at,updated_at) VALUES(:fname,:lname,:email,:pass,:created_at,:updated_at)";

                try {
                    $handle = $pdo->prepare($query);
                    $params = [
                        ':fname' => $firstName,
                        ':lname' => $lastName,
                        ':email' => $email,
                        ':pass' => $hashPassword,
                        ':created_at' => $date,
                        ':updated_at' => $date
                    ];

                    $handle->execute($params);

                    $success = 'User has been created successfully';

                } catch (PDOException $e) {
                    $errors[] = $e->getMessage();
                }
            } else {
                $valFirstName = $firstName;
                $valLastName = $lastName;
                $valEmail = '';
                $valPassword = $password;
                $valConfirmPassword =  $confirmPassword;
                $errors[] = 'Email address already registered';
            }
        } else {
            $errors[] = "Email address is not valid";
        }
    } else {
        if (!isset($_POST['first_name']) || empty($_POST['first_name'])) {
            $errors[] = 'First name is required';
        } else {
            $valFirstName = $_POST['first_name'];
        }
        if (!isset($_POST['last_name']) || empty($_POST['last_name'])) {
            $errors[] = 'Last name is required';
        } else {
            $valLastName = $_POST['last_name'];
        }

        if (!isset($_POST['email']) || empty($_POST['email'])) {
            $errors[] = 'Email is required';
        } else {
            $valEmail = $_POST['email'];
        }

        if (!isset($_POST['password']) || empty($_POST['password'])) {
            $errors[] = 'Password is required';
        } else {
            $valPassword = $_POST['password'];
        }
        if ($password !== $confirmPassword) {
            $errors[] = "Passwords do not match";
        }else {
            $errors[] = "Email, Password are required";
        }

    }

}