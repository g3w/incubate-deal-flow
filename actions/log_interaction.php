<?php
// Database configuration
include ('../settings/connection.php');
// Get form data
$deal_id = isset($_POST['deal_id']) ? intval($_POST['deal_id']) : 0;
$interaction_date = isset($_POST['interaction_date']) ? $_POST['interaction_date'] : '';
$notes = isset($_POST['notes']) ? $_POST['notes'] : '';

// Insert interaction log into the database
$sql = "INSERT INTO interactions (deal_id, interaction_date, notes) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $deal_id, $interaction_date, $notes);

if ($stmt->execute()) {
    // Redirect to interaction log page with success message
    header("Location: ../view/interaction_log.php?success=1");
} else {
    // Redirect to interaction log page with error message
    header("Location: ../view/interaction_log.php?error=1");
}

// Close the connection
$stmt->close();
$conn->close();
?>
