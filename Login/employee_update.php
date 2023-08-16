<!-- DATABASE connection -->
<?php
include('./controller/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <a href="index.php" class="btn btn-danger">BACK</a>

                    </div>
                    <div class="card-body">
                        <!-- before the form starts -->
                        <?php
                        if (isset($_GET['id'])) {
                            $employee_id = $_GET['id'];

                            $query = "SELECT * FROM members  WHERE id=:emplo_id ";
                            $stmt = $pdo->prepare($query);
                            $data = [':emplo_id' => $employee_id];
                            $stmt->execute($data);
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);


                        }
                        ?>
                        <form action="./controller/formhandler.inc.php" method="POST">
                            <input type="hidden" name="id" value="<?= $result["id"] ?>">
                            <div class="mb-3">
                                <label for="first_name">firstname:</label>
                                <input type="text" name="first_name" value="<?= $result["first_name"] ?>"
                                    class="form-control">
                            </div>
                            <!-- lastname -->
                            <div class="mb-3">
                                <label for="last_name">lastname:</label>
                                <input type="text" name="last_name" value="<?= $result["last_name"] ?>"
                                    class="form-control">
                            </div>


                            <!--email  -->
                            <div class="mb-3">
                                <label for="email">email:</label>
                                <input type="email" name="email" value="<?= $result["email"] ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password ">password:</label>
                                <input type="password" name="pwd" value="<?= $result["pwd"] ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update" class="btn btn-success">Update Employee</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>