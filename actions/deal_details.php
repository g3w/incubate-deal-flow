<?php
include('../settings/connection.php');
// Get the deal ID from the URL
$deal_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch deal details from the database
$sql = "SELECT * FROM deals WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $deal_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Output data of the deal
    $deal = $result->fetch_assoc();
    header("Location: ../view/deal_list.php?id=$deal_id&error=1");
} else {
    die("Deal not found");
}

// Close the connection
$stmt->close();
$conn->close();
?>
