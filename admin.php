<?php
// admin.php
session_start();
include("db.php"); // include your database connection

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Handle approve/reject action
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $action = $_GET['action'];

    if ($action == 'approve') {
        $conn->query("UPDATE booking SET status='Approved' WHERE id=$id");
    } elseif ($action == 'reject') {
    $reason = isset($_GET['reason']) ? $conn->real_escape_string($_GET['reason']) : 'No reason provided';
    $conn->query("UPDATE booking SET status='Rejected', reason='$reason' WHERE id=$id");
}
    header("Location: admin.php");
    exit();
}

// Fetch all bookings with user info
$sql = "SELECT b.id, u.fullname, u.email, b.space, b.booking_date, b.request_letter, b.status 
        FROM booking b 
        JOIN users u ON b.user_id = u.id 
        ORDER BY b.booking_date DESC";

$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - SVU Event Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url("https://res.cloudinary.com/dl0m0tkpq/image/upload/v1758790865/svuadmin_zfges4.webp") no-repeat center center fixed;
            background-size: cover;
            color: white;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.6); /* dark transparent layer */
            padding: 20px;
            border-radius: 10px;
        }
        .table {
            background-color: rgba(255, 255, 255, 0.9); /* white background for table */
            color: black;
        }
    </style>
</head>
<script>
function rejectWithReason(id) {
    let reason = prompt("Please provide a reason for rejection:");

    if (reason === null || reason.trim() === "") {
        alert("Rejection cancelled. Reason is required.");
        return;
    }

    // Redirect with reason
    window.location.href = "admin.php?action=reject&id=" + id + "&reason=" + encodeURIComponent(reason);
}
</script>
<body>
    <br><br>
            <b><button><a href="index.php">HOME</a></button></b>

<div class="container mt-4 overlay">
    <h2 class="mb-4 text-center text-light">Admin Dashboard - Manage Booking Requests</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Email</th>
                <th>Space</th>
                <th>Date</th>
                <th>Letter</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= htmlspecialchars($row['fullname']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td><?= htmlspecialchars($row['space']); ?></td>
                        <td><?= htmlspecialchars($row['booking_date']); ?></td>
                        <td><?= htmlspecialchars($row['request_letter']); ?></td>
                        <td>
                            <?php if ($row['status'] == 'Pending'): ?>
                                <span class="badge bg-warning">Pending</span>
                            <?php elseif ($row['status'] == 'Approved'): ?>
                                <span class="badge bg-success">Approved</span>
                            <?php else: ?>
                                <a href="#" onclick="rejectWithReason(<?= $row['id']; ?>)" class="btn btn-danger btn-sm"> click here for reason of Reject</a>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($row['status'] == 'Pending'): ?>
                                <a href="admin.php?action=approve&id=<?= $row['id']; ?>" class="btn btn-success btn-sm">Approve</a>
                                <a href="admin.php?action=reject&id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Reject</a>
                            <?php else: ?>
                                <em>No action</em>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">No bookings found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="text-center">
        <a href="logout.php" class="btn btn-secondary">Logout</a>
    </div>
</div>

</body>
</html>
