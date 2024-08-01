<?php
require_once 'db_connection.php'; // Include your database connection file

include("../settings/connections");

$deal_id = $_GET['deal_id'];
if (!is_numeric($deal_id)) {
    die(json_encode(["error" => "Invalid deal_id"]));
}

// Prepare and bind
$stmt = $conn->prepare("SELECT id, task, completed, notes FROM due_diligence WHERE deal_id = ?");
if (!$stmt) {
    die(json_encode(["error" => "Prepare failed: " . $conn->error]));
}

$stmt->bind_param("i", $deal_id);
if (!$stmt->execute()) {
    die(json_encode(["error" => "Execute failed: " . $stmt->error]));
}

$result = $stmt->get_result();

$tasks = [];
while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}

$stmt->close();
$conn->close();

echo json_encode($tasks);
?>
