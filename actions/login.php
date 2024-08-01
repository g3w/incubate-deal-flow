<?php
session_start();
include('../settings/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        echo "Email or Password is not set.";
        exit();
    }

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Debugging: Check email and password values after escaping
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Password: " . htmlspecialchars($password) . "<br>";

    // Check if user is an organization
    $orgQuery = "SELECT * FROM users WHERE email = '$email'";
    $orgResult = $conn->query($orgQuery);

    // Debugging: Check if the organization query executed correctly
    if (!$orgResult) {
        echo "Error executing query: " . $conn->error;
        exit();
    }

    if ($orgResult->num_rows > 0) {
        $row = $orgResult->fetch_assoc();

        // Debugging: Check the fetched row
        echo "Fetched organization row: ";
        print_r($row);

        if (password_verify($password, $row["password"])) {
            $_SESSION['user_id'] = $row['users_id'];
            header("Location: ../view/incubate.php");
            exit();
        } else {
            echo "Incorrect password for organization. Please try again.";
            exit();
        }
    }
}

$conn->close();
?>
