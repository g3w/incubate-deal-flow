<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Add New Deal</title>
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
        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-actions {
            display: flex;
            justify-content: flex-end;
        }
        .form-actions button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background: #3498db;
            color: #fff;
            cursor: pointer;
            transition: background 0.3s;
        }
        .form-actions button:hover {
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
            <h1>Add New Deal</h1>
        </div>

        <div class="form-container">
            <form action="../actions/submit_deal.php" method="POST">
                <div class="form-group">
                    <label for="deal-name">Deal Name</label>
                    <input type="text" id="deal-name" name="deal_name" required>
                </div>
                <div class="form-group">
                    <label for="industry">Industry</label>
                    <select id="industry" name="industry" required>
                        <option value="">Select Industry</option>
                        <option value="Tech">Tech</option>
                        <option value="Healthcare">Healthcare</option>
                        <option value="Finance">Finance</option>
                        <option value="Retail">Retail</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" required>
                        <option value="">Select Status</option>
                        <option value="New">New</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>
                <div class="form-actions">
                    <button type="submit">Add Deal</button>
                </div>
            </form>
        </div>
    </section>
</div>

</body>
</html>
