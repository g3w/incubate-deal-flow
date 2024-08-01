<?php

include('../settings/connection.php');

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form inputs
    $deal_name = sanitize_input($_POST["deal_name"]);
    $industry = sanitize_input($_POST["industry"]);
    $status = sanitize_input($_POST["status"]);
    $description = sanitize_input($_POST["description"]);

    // Check if any field is empty
    if (empty($deal_name) || empty($industry) || empty($status) || empty($description)) {
        echo "All fields are required.";
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO deals (startup_name, industry, status, stage) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $deal_name, $industry, $status, $description);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to a success page or display a success message
            header("Location: ./deal_list.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the connection
$conn->close();
?>
