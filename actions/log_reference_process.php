<?php
include("../settings/connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $deal_id = $_POST['deal_id'];
    $reference_name = $_POST['reference_name'];
    $notes = $_POST['notes'];

    // Prepare and execute the SQL query to insert the reference check
    $stmt = $pdo->prepare("INSERT INTO reference_checks (deal_id, reference_name, notes, created_at) VALUES (:deal_id, :reference_name, :notes, NOW())");
    $stmt->execute([
        'deal_id' => $deal_id,
        'reference_name' => $reference_name,
        'notes' => $notes
    ]);

    // Redirect or return a success message
    echo json_encode(['success' => 'Reference check logged successfully']);
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
?>
