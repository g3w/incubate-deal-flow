<?php
require_once 'db_connection.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $deal_id = $_POST['deal_id'];
    $tasks = $_POST['tasks']; // Expecting an array of task details

    foreach ($tasks as $task) {
        $task_id = $task['id'];
        $completed = isset($task['completed']) ? 1 : 0;
        $notes = $task['notes'];

        // Update task in the database
        $stmt = $pdo->prepare("UPDATE due_diligence SET completed = :completed, notes = :notes WHERE id = :id AND deal_id = :deal_id");
        $stmt->execute([
            'completed' => $completed,
            'notes' => $notes,
            'id' => $task_id,
            'deal_id' => $deal_id
        ]);
    }

    // Redirect or return a success message
    echo json_encode(['success' => 'Due diligence tasks updated successfully']);
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
?>
