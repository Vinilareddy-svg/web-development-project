<?php
// login.php
session_start();
include("db.php"); // include database connection

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // check if email exists in DB
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['fullname']; // store user session
            $_SESSION['email'] = $user['email'];
            header("Location: booking.php");
            exit();
        } else {
            echo "<script>alert('❌ Wrong password');</script>";
        }
    } else {
        echo "<script>alert('❌ No account found with this email');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SVU Event Booking - Login</title>
    <style>
        /* Full-page background image */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('https://res.cloudinary.com/dl0m0tkpq/image/upload/v1758622924/svu_login_ge2ba9.webp') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Form container */
        .login-container {
            background: rgba(0, 0, 0, 0.6); /* semi-transparent dark background */
            padding: 40px;
            border-radius: 10px;
            color: white;
            box-shadow: 0 0 15px rgba(0,0,0,0.5);
            width: 350px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: none;
        }

        .login-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #ff6600;
            color: white;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        .login-container button:hover {
            background-color: #e65c00;
        }

        .login-container a {
            color: #ffd700;
            text-decoration: none;
        }

        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login to Event Space Booking</h2>
        <form method="post" action="">
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" name="login">Login</button>
        </form>
        <p>Don’t have an account? <a href="register.php">Register Here</a></p>
        <p>need to go index page?<a href ="index.php">index page</a></p>
    </div>
</body>
</html>
