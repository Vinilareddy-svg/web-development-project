<?php
// admin_register.php
session_start();
include("db.php"); // database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email already exists
    $checkQuery = "SELECT * FROM admins WHERE email='$email' LIMIT 1";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // Email already registered
        echo "<script>alert('This email is already registered! Please login.'); window.location.href='admin_login.php';</script>";
        exit();
    }

    // Insert new admin
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO admins (fullname, email, password) VALUES ('$fullname', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Admin registered successfully! Please login.'); window.location.href='admin_login.php';</script>";
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('https://res.cloudinary.com/dl0m0tkpq/image/upload/v1758623874/svuadminregis_lefaph.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-card {
            background: rgba(0, 0, 0, 0.7); /* semi-transparent overlay */
            color: white;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
        }

        .register-card h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label, .form-control {
            color: white;
        }

        .form-control {
            background: rgba(255,255,255,0.1);
            border: none;
        }

        .form-control:focus {
            background: rgba(255,255,255,0.2);
            color: white;
        }

        .btn-danger {
            background-color: #ff6600;
            border: none;
        }

        .btn-danger:hover {
            background-color: #e65c00;
        }

        a {
            color: #ffd700;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-card">
    <h2>Admin Registration</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" name="fullname" id="fullname" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-danger">Register</button>
        </div>
        <p class="mt-3 text-center">Already have an account? <a href="admin_login.php">Login here</a></p>
        <b><button type="submit" class="btn btn-danger"><a href="index.php">HOME</a></button></b>
    </form>
</div>

</body>
</html>
