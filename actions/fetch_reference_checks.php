<?php
include("../settings/connection.php"); // Include your database connection file

if (isset($_GET['deal_id'])) {
    $deal_id = $_GET['deal_id'];

    // Prepare and execute the SQL query to fetch reference checks
    $stmt = $pdo->prepare("SELECT * FROM reference_checks WHERE deal_id = :deal_id ORDER BY created_at DESC");
    $stmt->execute(['deal_id' => $deal_id]);

    // Fetch results
    $references = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return results as JSON
    echo json_encode($references);
} else {
    echo json_encode(['error' => 'Deal ID is required']);
}
?>
