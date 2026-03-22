<?php
session_start();
include("db.php");

// make sure user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// get user id from DB
$email = $_SESSION['email'];
$userQuery = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' LIMIT 1");
$user = mysqli_fetch_assoc($userQuery);
$user_id = $user['id'];

if (isset($_POST['book'])) {
    $space = $_POST['space'];
    $date = $_POST['booking_date'];
    $letter = $_POST['letter'];

    $sql = "INSERT INTO booking (user_id, space, booking_date, request_letter, status) 
            VALUES ('$user_id', '$space', '$date', '$letter', 'Pending')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Booking request submitted successfully!');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SVU Event Booking - Book Space</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Full-page background image */
        .bg-image {
            background-image: url('https://res.cloudinary.com/dl0m0tkpq/image/upload/v1758535717/aditoriumsvu_tl2uol.webp');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start; /* form at top */
            padding-top: 50px; /* space from top */
        }

        /* Form container */
        .form-container {
            background-color: rgba(0, 0, 0, 0.6); /* semi-transparent dark bg */
            padding: 30px;
            border-radius: 15px;
            color: white;
            width: 400px;
        }

        .form-container input,
        .form-container select,
        .form-container textarea,
        .form-container button {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            border: none;
        }

        .form-container button {
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #218838;
        }

        .links {
            text-align: center;
            margin-top: 10px;
        }

        .links a {
            color: #ffc107;
            text-decoration: none;
            margin: 0 10px;
        }

        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="bg-image">
    <div class="form-container">
        <h2>Book Event Space</h2>
        <form method="post" action="">
            <label>Select Space:</label>
            <select name="space" required>
                <option value="Auditorium">Auditorium</option>
                <option value="Gym">Gym</option>
                <option value="Open Air Auditorium">Open Air Auditorium</option>
                <option value="Senate Hall">Senate Hall</option>
                <option value="Stadium">Stadium</option>
            </select>

            <label>Select Date:</label>
            <input type="date" name="booking_date" required>

            <label>Request Letter (Reason):</label>
            <textarea name="letter" rows="5" required></textarea>

            <button type="submit" name="book">Submit Request</button>
        </form>

        <div class="links">
            <a href="index.php">go to index page</a>
