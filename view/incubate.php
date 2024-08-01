<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Deal Flow Dashboard</title>
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
        .metric {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 23%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .chart-container {
            margin-top: 20px;
        }
        .chart {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
            <h1>Deal Flow Dashboard</h1>
            <a href="./add_deal.php" class="button">Add New Deal</a>
        </div>

        <div class="metrics-container">
            <div class="metric">
                <h2>Total Deals</h2>
                <p id="total-deals">0</p>
            </div>
            <div class="metric">
                <h2>Deals in Progress</h2>
                <p id="deals-in-progress">0</p>
            </div>
            <div class="metric">
                <h2>Completed Deals</h2>
                <p id="completed-deals">0</p>
            </div>
            <div class="metric">
                <h2>New Deals</h2>
                <p id="new-deals">0</p>
            </div>
        </div>

        <div class="chart-container">
            <div class="chart">
                <canvas id="deal-status-chart"></canvas>
            </div>
            <div class="chart" style="margin-top: 20px;">
                <canvas id="industry-distribution-chart"></canvas>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Sample data for demonstration
    const deals = [
        { status: 'New', industry: 'Tech' },
        { status: 'In Progress', industry: 'Healthcare' },
        { status: 'Completed', industry: 'Tech' },
        { status: 'In Progress', industry: 'Finance' },
        { status: 'New', industry: 'Finance' },
        { status: 'Completed', industry: 'Healthcare' },
    ];

    // Calculate metrics
    const totalDeals = deals.length;
    const dealsInProgress = deals.filter(deal => deal.status === 'In Progress').length;
    const completedDeals = deals.filter(deal => deal.status === 'Completed').length;
    const newDeals = deals.filter(deal => deal.status === 'New').length;

    document.getElementById('total-deals').textContent = totalDeals;
    document.getElementById('deals-in-progress').textContent = dealsInProgress;
    document.getElementById('completed-deals').textContent = completedDeals;
    document.getElementById('new-deals').textContent = newDeals;

    // Deal Status Chart
    const dealStatusCtx = document.getElementById('deal-status-chart').getContext('2d');
    new Chart(dealStatusCtx, {
        type: 'pie',
        data: {
            labels: ['New', 'In Progress', 'Completed'],
            datasets: [{
                label: 'Deal Status',
                data: [newDeals, dealsInProgress, completedDeals],
                backgroundColor: ['#3498db', '#f1c40f', '#2ecc71'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Deal Status Distribution'
                }
            }
        }
    });

    // Industry Distribution Chart
    const industryDistribution = deals.reduce((acc, deal) => {
        acc[deal.industry] = (acc[deal.industry] || 0) + 1;
        return acc;
    }, {});

    const industryLabels = Object.keys(industryDistribution);
    const industryData = Object.values(industryDistribution);

    const industryDistributionCtx = document.getElementById('industry-distribution-chart').getContext('2d');
    new Chart(industryDistributionCtx, {
        type: 'bar',
        data: {
            labels: industryLabels,
            datasets: [{
                label: 'Industry Distribution',
                data: industryData,
                backgroundColor: ['#3498db', '#f1c40f', '#2ecc71', '#e74c3c'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Industry Distribution'
                }
            }
        }
    });
</script>
</body>
</html>
