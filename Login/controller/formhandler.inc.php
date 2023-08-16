
<?php
session_start();
include('config.php');


// Deleting an employee
if (isset($_POST['delete_employee'])) {
    $employee_id = $_POST['delete_employee'];

    try {
        $query = "DELETE FROM members WHERE id = :employee_id";
        $stmt = $pdo->prepare($query);
        $query_execute = $stmt->execute([':employee_id' => $employee_id]);

        if ($query_execute) {
            $_SESSION['message'] = "Deleted successfully";
        } else {
            $_SESSION['message'] = "Failed to delete";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    header('Location: ../index.php');
    exit(0);
}




// Updating an employee
if (isset($_POST['update'])) {
    $employee_id = $_POST['id'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    


    try {
        $query = "UPDATE members SET first_name = :fname, last_name = :lname, email = :email, pwd= :pwd WHERE id = :employee_id";
        $stmt = $pdo->prepare($query);
        
      

        $data = [
            ':employee_id' => $employee_id,
            ':fname' => $firstname,
            ':lname' => $lastname,
            ':email' => $email,
            ':pwd' => $password,


        ];
        echo "Query: " . $query . "<br>"; // Debugging output
        var_dump($data);

        $query_execute = $stmt->execute($data);

        if ($query_execute) {
            $_SESSION['message'] = "Updated successfully";
         
        } else {
            $_SESSION['message'] = "Failed to update";
      
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    header('Location: ../index.php');
    exit(0);
}

// Inserting a new employee
if (isset($_POST['save'])) {
    $firstname = $_POST["first_name"];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    try {
        // inserting into the database 
        $query = "INSERT INTO members (first_name, last_name, email, pwd) VALUES (:fname, :lname, :email, :password_hash)";
        $stmt = $pdo->prepare($query);

        $data = [
            ':fname' => $firstname,
            ':lname' => $lastname,
            ':email' => $email,
            ':password_hash' => $password_hash,
        ];

        $query_execute = $stmt->execute($data);

        if ($query_execute) {
            $_SESSION['message'] = "Added successfully";
        } else {
            $_SESSION['message'] = "Failed to add";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    header('Location: ../index.php');
    exit(0);
}


    

























































































































































































































