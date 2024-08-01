<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Deal Details</title>
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
        .details-container {
            margin-top: 20px;
        }
        .details-container form {
            display: flex;
            flex-direction: column;
        }
        .details-container form label {
            margin: 5px 0;
        }
        .details-container form input {
            padding: 8px;
            margin-bottom: 15px;
            font-size: 16px;
        }
        .details-container form button {
            padding: 10px;
            background: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .details-container form button:hover {
            background: #2980b9;
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
            <h1>Deal Details</h1>
        </div>

        <div class="details-container">
            <form action="../actions/deal_process.php" method="POST">
                <?php
                include("../settings/connection.php");
                // Include the PHP script to fetch deal details
                include '../actions/deal_details.php';

                // Display the deal details in the form
                ?>
                <input type="hidden" name="deal_id" value="<?php echo htmlspecialchars($deal['id']); ?>">
                <label for="startup_name">Startup Name:</label>
                <input type="text" id="startup_name" name="startup_name" value="<?php echo htmlspecialchars($deal['startup_name']); ?>" required>
                <label for="founder">Founder:</label>
                <input type="text" id="founder" name="founder" value="<?php echo htmlspecialchars($deal['founder']); ?>">
                <label for="industry">Industry:</label>
                <input type="text" id="industry" name="industry" value="<?php echo htmlspecialchars($deal['industry']); ?>">
                <label for="stage">Stage:</label>
                <input type="text" id="stage" name="stage" value="<?php echo htmlspecialchars($deal['stage']); ?>">
                <label for="status">Status:</label>
                <input type="text" id="status" name="status" value="<?php echo htmlspecialchars($deal['status']); ?>">
                <button type="submit">Update Deal</button>
            </form>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
