<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Deal List</title>
    <link rel="stylesheet" href="../css/dash_style.css"/>
    <link rel="stylesheet" href="../css/admin_style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
        }
        .container {
            display: flex;
        }
        nav {
            width: 250px;
            background: #34495e;
            color: #fff;
            height: 100vh;
            position: fixed;
        }
        nav ul {
            list-style: none;
            padding: 0;
        }
        nav ul li {
            width: 100%;
        }
        nav ul li a {
            display: block;
            padding: 15px;
            color: #fff;
            text-decoration: none;
            transition: background 0.3s;
        }
        nav ul li a:hover {
            background: #2c3e50;
        }
        nav ul li a .nav-item {
            margin-left: 10px;
        }
        section {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .dashboard-header h1 {
            margin: 0;
        }
        .metrics-container {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }
        .table-container {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }
        table th,
        table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        table tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
<div class="container">
    <nav>
        <ul>
            <li>
                <a href="incubate.php">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="add_deal.php">
                    <i class="fas fa-tasks"></i>
                    <span class="nav-item">Add New Deal</span>
                </a>
            </li>
            <li>
                <a href="deal_list.php">
                    <i class="fas fa-tasks"></i>
                    <span class="nav-item">Deal List</span>
                </a>
            </li>
            <li>
                <a href="deal_details.php">
                    <i class="fas fa-tasks"></i>
                    <span class="nav-item">Deal Details</span>
                </a>
            </li>
            <li>
                <a href="interaction_log.php">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Interaction Log</span>
                </a>
            </li>
            <li>
                <a href="due_diligence.php">
                    <i class="fas fa-university"></i>
                    <span class="nav-item">Due Diligence</span>
                </a>
            </li>
            <li>
                <a href="reference_check.php">
                    <i class="fas fa-bell"></i>
                    <span class="nav-item">Reference Check</span>
                </a>
            </li>
            <li>
                <a href="profile.php">
                    <i class="fas fa-user"></i>
                    <span class="nav-item">Profile</span>
                </a>
            </li>
            <li>
                <a href="change_password.php" class="settings">
                    <i class="fas fa-cog"></i>
                    <span class="nav-item">Change Password</span>
                </a>
            </li>
            <li>
                <a href="#" class="help">
                    <i class="fas fa-question-circle"></i>
                    <span class="nav-item">Help</span>
                </a>
            </li>
            <li>
                <a href="Login/logout.php" class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Log out</span>
                </a>
            </li>
        </ul>
    </nav>

    <section>
        <div class="dashboard-header">
            <h1>Deal List</h1>
        </div>

        <div class="table-container">
            <h2>All Deals</h2>
            <table>
                <thead>
                    <tr>
                        <th>Startup Name</th>
                        <th>Founder</th>
                        <th>Industry</th>
                        <th>Stage</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
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
                </tbody>
            </table>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
