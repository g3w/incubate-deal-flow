<?php
include('../settings/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $phone = $_POST["tel"];
    $email = $_POST["email"];
    $password = password_hash($_POST["passwd"], PASSWORD_DEFAULT);

    // Check if there is already a user with the same email
    $checkEmailQuery = "SELECT email FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkEmailQuery);

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        // A user with the same email already exists
        $stmt->close();
        $conn->close();
        header("Location: ../Login/signup.php?error=email_exists");
        exit();
    }
    $stmt->close();

    // Insert the user data into the users table
    $sql = "INSERT INTO users (first_name, last_name, mobile_number, email, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("sssss", $fname, $lname, $phone, $email, $password);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        // Redirect the user to the login page
        header("Location: ../Login/login.php");
        exit();
    } else {
        // Error during insert
        $stmt->close();
        $conn->close();
        header("Location: ../Login/signup.php?error=insert_failed");
        exit();
    }
}
?>
