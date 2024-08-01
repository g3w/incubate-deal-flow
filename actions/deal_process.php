<?php

include ("../settings/connection.php");

// Get form data
$deal_id = isset($_POST['deal_id']) ? intval($_POST['deal_id']) : 0;
$startup_name = isset($_POST['startup_name']) ? $_POST['startup_name'] : '';
$founder = isset($_POST['founder']) ? $_POST['founder'] : '';
$industry = isset($_POST['industry']) ? $_POST['industry'] : '';
$stage = isset($_POST['stage']) ? $_POST['stage'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';

// Update deal details in the database
$sql = "UPDATE deals SET startup_name = ?, founder = ?, industry = ?, stage = ?, status = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $startup_name, $founder, $industry, $stage, $status, $deal_id);

if ($stmt->execute()) {
    // Redirect to deal details page with success message
    header("Location: ./deal_details.php?id=$deal_id&success=1");
} else {
    // Redirect to deal details page with error message
    header("Location: ./deal_details.php?id=$deal_id&error=1");
}

// Close the connection
$stmt->close();
$conn->close();
?>

