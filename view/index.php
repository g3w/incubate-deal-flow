<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Index Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #34495e;
            color: #fff;
            font-family: Arial, sans-serif;
            text-align: center;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }


        .navbar {
            background: #2c3e50;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            display: inline-block;
            font-size: 16px;
            border: 1px solid #fff;
            border-radius: 5px;
            margin: 0 5px;
            transition: background 0.3s, color 0.3s;
        }
        .navbar a:hover {
            background: #fff;
            color: #34495e;
        }
        .incubate-fund {
            margin-top: 300px; /* Adjust this if needed */
            font-size: 6em;
            font-weight: bold;
            color: #fff;
            animation: shuffle 4s infinite;
            font-family: 'Arial', sans-serif; /* Change this to any font you like */
        }

        .deal{
            font-weight: bold;
            color: #fff;  
            font-family: 'Arial', sans-serif; /* Change this to any font you like */
        }
        @keyframes shuffle {
            0% { transform: translateY(-10px); }
            25% { transform: translateY(10px); }
            50% { transform: translateY(-10px); }
            75% { transform: translateY(10px); }
            100% { transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="../Login/signup.php">Sign Up</a>
        <a href="../Login/login.php">Login</a>
        <a href="../Login/contact.php">Contact</a>
        <a href="../Login/team.php">Team</a>
    </div>

    <div class="incubate-fund">
        Incubate Fund
    </div>
    <h3 class="deal">Deal Flow Dashboard</h3>
</body>
</html>
