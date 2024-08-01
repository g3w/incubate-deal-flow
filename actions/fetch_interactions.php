<?php
include("./settings/connection.php");
// Fetch interaction logs

// Fetch past interactions from the database
$sql = "SELECT deal_id, interaction_date, notes FROM interactions ORDER BY interaction_date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="interaction-item">';
        echo '<p><strong>Deal ID:</strong> ' . htmlspecialchars($row['deal_id']) . '</p>';
        echo '<p><strong>Date:</strong> ' . htmlspecialchars($row['interaction_date']) . '</p>';
        echo '<p><strong>Notes:</strong> ' . nl2br(htmlspecialchars($row['notes'])) . '</p>';
        echo '</div>';
    }
} else {
    echo '<p>No interactions logged yet.</p>';
}

// Close the connection
$conn->close();
?>
