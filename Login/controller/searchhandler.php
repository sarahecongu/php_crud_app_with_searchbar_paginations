
<?php
include('config.php');


$recordsPerPage = 10; // Number of records to display per page
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $recordsPerPage;


if (isset($_POST['search']) && !empty($_POST['search'])) {
    $search = '%' . $_POST['search'] . '%';
    $query = "SELECT * FROM members WHERE first_name LIKE :search OR last_name LIKE :search OR email LIKE :search ORDER BY id DESC";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':search', $search, PDO::PARAM_STR);
} else {
    $query = "SELECT * FROM members ORDER BY id DESC";
    $stmt = $pdo->prepare($query);
}

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $countQuery = "SELECT COUNT(*) FROM members WHERE first_name LIKE :search OR last_name LIKE :search OR email LIKE :search";
    $countStmt = $pdo->prepare($countQuery);
    $countStmt->bindParam(':search', $search, PDO::PARAM_STR);
} else {
    $countQuery = "SELECT COUNT(*) FROM members";
    $countStmt = $pdo->prepare($countQuery);
}

$countStmt->execute();
$totalRecords = $countStmt->fetchColumn();
$totalPages = ceil($totalRecords / $recordsPerPage);


// $stmt->execute();
// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);



