<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Due Diligence</title>
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
        .diligence-container .checklist label {
            display: block;
        }
    </style>
</head>
<body>
<div class="container">
    <nav>
        <ul>
            <li>
                <a href="./incubate.php">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="./add_deal.php">
                    <i class="fas fa-tasks"></i>
                    <span class="nav-item">Add New Deal</span>
                </a>
            </li>
            <li>
                <a href="./deal_list.php">
                    <i class="fas fa-tasks"></i>
                    <span class="nav-item">Deal List</span>
                </a>
            </li>
            <li>
                <a href="./deal_details.php">
                    <i class="fas fa-tasks"></i>
                    <span class="nav-item">Deal Details</span>
                </a>
            </li>
            <li>
                <a href="./interaction_log.php">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Interaction Log</span>
                </a>
            </li>
            <li>
                <a href="./due_diligence.php">
                    <i class="fas fa-university"></i>
                    <span class="nav-item">Due Diligence</span>
                </a>
            </li>
            <li>
                <a href="./reference_check.php">
                    <i class="fas fa-bell"></i>
                    <span class="nav-item">Reference Check</span>
                </a>
            </li>
            <li>
                <a href="./profile.php">
                    <i class="fas fa-user"></i>
                    <span class="nav-item">Profile</span>
                </a>
            </li>
            <li>
                <a href="./change_password.php" class="settings">
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
                <a href="./Login/logout.php" class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Log out</span>
                </a>
            </li>
        </ul>
    </nav>
    <section>
        <div class="dashboard-header">
        </div>

        <div class="diligence-container">
            <h2>Due Diligence</h2>
            <form id="dueDiligenceForm">
                <label for="deal_id">Deal ID:</label>
                <input type="text" id="deal_id" name="deal_id" required>

                <div class="checklist" id="checklistContainer">
                    <!-- Checklist items will be dynamically added here -->
                </div>
                <button type="submit">Update Due Diligence</button>
            </form>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dealIdInput = document.getElementById('deal_id');
            const checklistContainer = document.getElementById('checklistContainer');
            const form = document.getElementById('dueDiligenceForm');

            // Simulated data
            const dueDiligenceData = {
                "deal_1": [
                    { id: 1, task: "Task 1", completed: true, notes: "Notes for task 1" },
                    { id: 2, task: "Task 2", completed: false, notes: "Notes for task 2" }
                ],
                "deal_2": [
                    { id: 3, task: "Task 3", completed: true, notes: "Notes for task 3" },
                    { id: 4, task: "Task 4", completed: false, notes: "Notes for task 4" }
                ]
            };

            dealIdInput.addEventListener('blur', function() {
                const dealId = dealIdInput.value;
                const data = dueDiligenceData[dealId];
                if (data) {
                    checklistContainer.innerHTML = '';
                    data.forEach(task => {
                        checklistContainer.innerHTML += `
                            <label>
                                <input type="checkbox" name="tasks[${task.id}][completed]" ${task.completed ? 'checked' : ''}> ${task.task}
                                <input type="hidden" name="tasks[${task.id}][id]" value="${task.id}">
                                <textarea name="tasks[${task.id}][notes]" placeholder="Notes">${task.notes}</textarea>
                            </label>
                        `;
                    });
                } else {
                    checklistContainer.innerHTML = '<p>No due diligence tasks found for this deal ID.</p>';
                }
            });

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(form);
                const entries = Array.from(formData.entries());
                console.log('Form data:', entries);
                alert('Due diligence tasks updated successfully!');
            });
        });
    </script>
</body>
</html>
