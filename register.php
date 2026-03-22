<?php
// register.php
include("db.php"); // database connection

if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Insert user into DB
    $sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Registration Successful! Please Login'); window.location='login.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SVU Event Booking - Register</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: url('https://res.cloudinary.com/dl0m0tkpq/image/upload/v1754058835/download_3_w3mzbq.webp') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background: rgba(0, 0, 0, 0.6); /* dark transparent background */
            padding: 30px;
            border-radius: 10px;
            width: 350px;
            text-align: center;
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        .form-container label {
            float: left;
            font-weight: bold;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
            border: none;
            border-radius: 5px;
        }

        .form-container button {
            background: #28a745;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .form-container button:hover {
            background: #218838;
        }

        .form-container p a {
            color: #00c3ff;
            text-decoration: none;
        }

        .form-container p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Register for Event Space Booking</h2>
        <form method="post" action="">
            <label>Full Name:</label><br>
            <input type="text" name="fullname" required><br>

            <label>Email:</label><br>
            <input type="email" name="email" required><br>

            <label>Password:</label><br>
            <input type="password" name="password" required><br>

            <button type="submit" name="register">Register</button>
        </form>
        <p>Already registered? <a href="login.php">Login Here</a></p>
        <p>need to go index page?<a href ="index.php">index page</a></p>
    </div>
</body>
</html>
