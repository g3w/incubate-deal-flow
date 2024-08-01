<?php
include('../settings/connection.php');

// Fetch deals from the database
$sql = "SELECT * FROM deals";
$result = $conn->query($sql);

if ($result === false) {
    die("Database query failed: " . htmlspecialchars($conn->error));
}

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["startup_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["founder"]) . "</td>"; // Ensure column name matches
        echo "<td>" . htmlspecialchars($row["industry"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["stage"]) . "</td>"; // Ensure column name matches
        echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
        echo "<td><a href='../view/deal_details.php?id=" . $row["id"] . "'>View Details</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No deals found</td></tr>";
}

// Close the connection
$conn->close();
?>
