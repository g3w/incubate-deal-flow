<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Parking</title>
    <link rel="stylesheet" href="../css/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
</head>

<body>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <div class="container">
        <div class="form-area">
            <form action="../actions/signup_action.php" name="form" method="POST" onsubmit="return system_validation()">
                <h2>SIGN UP</h2>
                <div class="type-box">
                    <i class='bx bx-user-circle'></i>
                    <input type="text" name="fname" placeholder="firstname" required>
                </div>

                <div class="type-box">
                    <i class='bx bx-user-circle'></i>
                    <input type="text" name="lname" placeholder="lastname" required>
                </div>

                <div class="type-box">
                    <i class='bx bxs-envelope'></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>


                <div class="type-box">
                    <i class='bx bxs-phone'></i>
                    <label class="lab" for="phone">Enter a phone number</label><br>
                    <input type="tel" id="phone" name="tel" placeholder="1234567890" pattern="[0-9]{10}" required>
                </div>

                <div class="type-box">
                    <i class='bx bx-lock'></i>
                    <input type="password" name="passwd" placeholder="Password" required>
                </div>

                <div class="type-box">
                    <i class='bx bx-lock'></i>
                    <input type="password" name="confirmPassword" placeholder="Confirm" required>
                </div>

                <div class="button">
                    <input type="submit" class="submit-btn" value="Sign UP">
                </div>

                <div class="group">
                    <span><a href="#">Forget Password</a></span>
                    <span><a href="login.php">Login</a></span>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/index.js"></script>
</body>

</html>
