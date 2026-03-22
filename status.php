<?php
session_start();
include("db.php"); // your database connection

// Make sure user is logged in
if (!isset($_SESSION['email'])) {
    echo "Please login first.";
    exit();
}

$email = $_SESSION['email'];

// Get user ID from users table
$userQuery = mysqli_query($conn, "SELECT id FROM users WHERE email='$email' LIMIT 1");
if (!$userQuery || mysqli_num_rows($userQuery) == 0) {
    echo "User not found.";
    exit();
}
$user = mysqli_fetch_assoc($userQuery);
$user_id = $user['id'];

// Fetch bookings for this user
$sql = "SELECT * FROM booking WHERE user_id='$user_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Status</title>
    <style>
        /* Full-page background */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('https://res.cloudinary.com/dl0m0tkpq/image/upload/v1758623245/statussvu_yd4rtn.webp') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Container with semi-transparent overlay */
        .status-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            color: white;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
            width: 90%;
            max-width: 900px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #fff;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: rgba(255, 255, 255, 0.2);
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #ff6600;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #e65c00;
        }
    </style>
</head>
<body>
    <div class="status-container">
        <h2>Your Booking Requests</h2>
        <table>
            <tr>
                <th>Space</th>
                <th>Date</th>
                <th>Letter</th>
                <th>Status</th>
                <th>Reason</th>
            </tr>
            <?php if($result && $result->num_rows > 0) { ?>
                <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['space']); ?></td>
                    <td><?php echo htmlspecialchars($row['booking_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['request_letter']); ?></td>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                    <td><?php echo htmlspecialchars($row['reason']); ?></td>
                </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="4">No bookings found.</td>
                </tr>
            <?php } ?>
        </table>
        <a href="index.php">Back to home</a>
    </div>
</body>
</html>
