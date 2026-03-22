<?php
// index.php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SVU Event Booking System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Full-page background image */
        .bg-image {
            background-image: url('https://res.cloudinary.com/dl0m0tkpq/image/upload/v1758534971/adbuilding_svu_ibadsu.webp');
            background-size: cover;
            background-position: center;
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.7);
        }

        /* Container for text/buttons */
        .content-container {
            background-color: rgba(0,0,0,0.4); /* semi-transparent background for readability */
            padding: 30px;
            border-radius: 15px;
        }

        .btn-lg {
            min-width: 180px;
        }
    </style>
</head>
<body>

<div class="bg-image">
    <div class="content-container">
        <h1 class="mb-4">Welcome to SVU Event Space Booking System</h1>
        <p class="lead">Book spaces like Auditorium, Gym, Open Air Auditorium, Senate Hall, and Stadium</p>
        
        <div class="d-grid gap-3 col-12 mx-auto mt-4">
            <!-- Register button opens modal -->
            <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>

            <a href="login.php" class="btn btn-success btn-lg">User Login</a>
            <a href="booking.php" class="btn btn-warning btn-lg">Book a Space</a>
            <a href="status.php" class="btn btn-info btn-lg">Check Booking Status</a>
            <a href="admin_login.php" class="btn btn-danger btn-lg">Admin Login</a>
            <a href="detailsof_spaces.php" class="btn btn-danger btn-lg">spaces details</a>
        </div>
    </div>
</div>

<!-- Modal for Register Choice -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Choose Registration Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <p>Do you want to register as a User or Admin?</p>
        <a href="register.php" class="btn btn-success me-3">User Registration</a>
        <a href="admin_register.php" class="btn btn-danger">Admin Registration</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>
