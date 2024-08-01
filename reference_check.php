<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Reference Check</title>
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
        .reference-container .reference-list {
            margin-top: 20px;
        }
        .reference-container .reference-list table {
            width: 100%;
            border-collapse: collapse;
        }
        .reference-container .reference-list table, th, td {
            border: 1px solid #ddd;
        }
        .reference-container .reference-list th, td {
            padding: 8px;
            text-align: left;
        }
        .reference-container .reference-list th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="container">
    <nav>
        <ul>
            <li><a href="./incubate.php"><i class="fas fa-home"></i><span class="nav-item">Dashboard</span></a></li>
            <li><a href="./add_deal.php"><i class="fas fa-tasks"></i><span class="nav-item">Add New Deal</span></a></li>
            <li><a href="./deal_list.php"><i class="fas fa-tasks"></i><span class="nav-item">Deal List</span></a></li>
            <li><a href="./deal_details.php"><i class="fas fa-tasks"></i><span class="nav-item">Deal Details</span></a></li>
            <li><a href="./interaction_log.php"><i class="fas fa-home"></i><span class="nav-item">Interaction Log</span></a></li>
            <li><a href="./due_diligence.php"><i class="fas fa-university"></i><span class="nav-item">Due Diligence</span></a></li>
            <li><a href="./reference_check.php"><i class="fas fa-bell"></i><span class="nav-item">Reference Check</span></a></li>
            <li><a href="../profile.php"><i class="fas fa-user"></i><span class="nav-item">Profile</span></a></li>
            <li><a href="./change_password.php" class="settings"><i class="fas fa-cog"></i><span class="nav-item">Change Password</span></a></li>
            <li><a href="#" class="help"><i class="fas fa-question-circle"></i><span class="nav-item">Help</span></a></li>
            <li><a href="./Login/logout.php" class="logout"><i class="fas fa-sign-out-alt"></i><span class="nav-item">Log out</span></a></li>
        </ul>
    </nav>

    <section>
        <div class="dashboard-header">
        </div>

        <div class="reference-container">
            <h2>Reference Check</h2>
            <form id="referenceCheckForm">
                <label for="deal_id">Deal ID:</label>
                <input type="text" id="deal_id" name="deal_id" required>
                <label for="reference_name">Reference Name:</label>
                <input type="text" id="reference_name" name="reference_name" required>
                <label for="notes">Notes:</label>
                <textarea id="notes" name="notes" required></textarea>
                <button type="submit">Log Reference</button>
            </form>
            <div class="reference-list">
                <!-- List of recorded reference checks will appear here -->
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dealIdInput = document.getElementById('deal_id');
            const referenceList = document.querySelector('.reference-list');
            const form = document.getElementById('referenceCheckForm');

            // Simulated data store
            const referenceData = {};

            // Fetch reference checks when a deal ID is entered
            dealIdInput.addEventListener('blur', function() {
                const dealId = dealIdInput.value;
                if (dealId) {
                    const data = referenceData[dealId] || [];
                    referenceList.innerHTML = '';
                    if (data.length > 0) {
                        let table = `<table>
                            <thead>
                                <tr>
                                    <th>Reference Name</th>
                                    <th>Notes</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>`;
                        data.forEach(reference => {
                            table += `<tr>
                                <td>${reference.reference_name}</td>
                                <td>${reference.notes}</td>
                                <td>${new Date(reference.created_at).toLocaleDateString()}</td>
                            </tr>`;
                        });
                        table += `</tbody></table>`;
                        referenceList.innerHTML = table;
                    } else {
                        referenceList.innerHTML = '<p>No reference checks found for this deal.</p>';
                    }
                }
            });

            // Handle form submission
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(form);
                const dealId = formData.get('deal_id');
                const referenceName = formData.get('reference_name');
                const notes = formData.get('notes');
                
                const newReference = {
                    reference_name: referenceName,
                    notes: notes,
                    created_at: new Date().toISOString()
                };

                if (!referenceData[dealId]) {
                    referenceData[dealId] = [];
                }
                referenceData[dealId].push(newReference);

                alert('Reference logged successfully!');
                
                // Clear the form and update the reference list
                form.reset();
                dealIdInput.dispatchEvent(new Event('blur'));
            });
        });
    </script>
</div>
</body>
</html>
