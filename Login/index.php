<?php
session_start();
include('./controller/searchhandler.php');

include('./controller/config.php');

if (!isset($_SESSION['id'])) { // Check if the session id is not set
    header('Location: login.php?error=login_required');
    exit();
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

    <style>
        /* Your CSS styles here */
        h3 {
            text-align: center;
            align-items: center;
            margin-top: 5px;
            font-size: 30px;
            /* color: blue; */

        }
    </style>
</head>

<body class="bg-dark text-white">

    <h3 class="mt-4">Welcome to our app
        <?php echo ucfirst($_SESSION['first_name']) ?>
    </h3>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <!-- checking for session setting -->
                <?php if (isset($_SESSION['message'])): ?>
                    <h5 class="alert alert-success">
                        <?= $_SESSION['message']; ?>
                    </h5>
                    <!-- stopping the session -->
                    <?php unset($_SESSION['message']); ?>
                <?php endif; ?>

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="row">
                                <div class="col-md-12">
                                <form action="index.php" method="POST">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search for a user">
                                        <button type="submit" class="btn btn-secondary">Search</button>
                                    </div>
                                </div>
                            </div>
                            <!-- ad employee button -->
                            <span class="col-2">
                                <a href="employee_add.php" class="btn btn-primary float-end"><i
                                        class="bi bi-person-plus-fill"></i> ADD</a>
                            </span>
                            <!-- add logout button -->
                            <span class="col-2">
                                <a href="./controller/logout.php?logout=true" class="btn btn-danger float-end"
                                    onclick="return confirm('Are you sure you want to log out?')">Logout</a>
                            </span>
                        </div>
                    </div>
                    <!-- constructoing a table -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                // $query = "SELECT * FROM members ORDER BY id DESC";
                                // $stmt = $pdo->prepare($query);
                                $stmt->execute();
                                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);




                                // fetching all users
                                
                                if ($result) {
                                    foreach ($result as $row) {

                                        // $result = $stmt->fetchAll();
                                        ?>
                                        <!-- fetching the recors from the database -->
                                        <tr>
                                            <td>
                                                <?= $row['id'] ?>
                                            </td>
                                            <td>
                                                <?= ucfirst($row['first_name']); ?>
                                            </td>
                                            <td>
                                                <?= ucwords(substr($row['last_name'], 0, 2)) . strtolower(substr($row['last_name'], 2)); ?>
                                            </td>
                                            <td>
                                                <?= $row['email'] ?>
                                            </td>
                                            <td>
                                                <?= $row['created_at']; ?>
                                            </td>
                                            <td>
                                                <?= $row['updated_at']; ?>
                                            </td>
                                            <!-- edit button -->
                                            <td>
                                                <a href="employee_update.php?id=<?= $row['id'] ?>"
                                                    class="btn btn-success btn-sm float-end">
                                                    <i class="bi bi-pencil-square"></i> EDIT
                                                </a>
                                            </td>
                                            <!-- delete buttton -->
                                            <td>
                                                <form action="./controller/formhandler.inc.php" method="POST">
                                                    <button type="submit" name="delete_employee"
                                                        class="btn btn-danger btn-sm float-end" value="<?= $row['id']; ?>">
                                                        <i class="bi bi-trash3"></i> DELETE
                                                    </button>

                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }

                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="8">No Record</td>
                                    </tr>
                                    <?php
                                }

                                ?>

                            </tbody>
                        </table>
                        <!-- pagination -->
                        <div class="d-flex justify-content-center mt-3">
                            <ul class="pagination">
                                <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
                                    <a class="page-link" href="index.php?page=<?= $page - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                                        <a class="page-link" href="index.php?page=<?= $i; ?>"><?= $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                                <li class="page-item <?php if ($page >= $totalPages) echo 'disabled'; ?>">
                                    <a class="page-link" href="index.php?page=<?= $page + 1; ?>">Next</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>