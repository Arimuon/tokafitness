<?php
// Include the functions file from the root directory
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';

// Check if session is not already started
if (session_status() == PHP_SESSION_NONE) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    };
}

// Redirect to home page if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: /');
    exit();
}

// Redirect to bookings page if no booking ID is provided
if (!isset($_GET["id"])) {
    header('Location: /dashboard/bookings/');
    exit();
}

// Include database connection file
include $_SERVER['DOCUMENT_ROOT'] . '/database.php';

// Prepare and execute SQL query to delete the booking
$stmt = $conn->prepare("DELETE FROM tokabookings WHERE id = ?");
$stmt->bind_param("i", $_GET["id"]); // Bind the booking ID as integer
$stmt->execute();

// Redirect back to bookings page with success message
header('Location: /dashboard/bookings?msg=Training deleted successfully!');
exit();
