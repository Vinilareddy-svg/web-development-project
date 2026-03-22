<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // if not logged in, redirect to login
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SVU Event Booking - Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['user']; ?> 🎉</h2>
    <p>You are now logged in. Book your event spaces here.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
