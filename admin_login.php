<?php
session_start();
include("db.php"); // database connection file

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hardcoded super admin (always valid)
    if ($email == "admin@svu.com" && $password == "admin123") {
        $_SESSION['admin'] = "Super Admin";
        header("Location: admin.php");
        exit();
    }

    // Otherwise, check DB
    $sql = "SELECT * FROM admins WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();

        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin'] = $admin['fullname'];
            header("Location: admin.php");
            exit();
        } else {
            $error = "Invalid Password!";
        }
    } else {
        $error = "No admin found with this email!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('https://res.cloudinary.com/dl0m0tkpq/image/upload/v1758623690/svuadminlogin_bkgtqe.webp') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background: rgba(0, 0, 0, 0.7); /* semi-transparent dark overlay */
            color: white;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
        }

        .login-card h2 {
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

        .alert-danger {
            background-color: rgba(255,0,0,0.6);
            border: none;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h2>Admin Login</h2>
    <?php if (!empty($error)) { ?>
        <div class="alert alert-danger text-center"><?php echo $error; ?></div>
    <?php } ?>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="email" class="form-label">Admin Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-danger">Login</button><br>
            <b><button type="submit" class="btn btn-danger"><a href="index.php">HOME</a></button></b>
        </div>
    </form>
</div>

</body>
</html>
