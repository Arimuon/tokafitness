<?php
// Include necessary functions for session management and other utilities
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';

// Start session if it hasn't been started yet
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in by verifying the session variable
if (!isset($_SESSION['user_id'])) {
    header('Location: /'); // Redirect to homepage if not logged in
    exit();
}

// Check if the 'datetime' parameter is present in the URL
if (!isset($_GET["datetime"])) {
    header('Location: /dashboard/'); // Redirect to dashboard if datetime is missing
    exit();
}

// Include database connection
include $_SERVER['DOCUMENT_ROOT'] . '/database.php';

// Validate the datetime format from the URL
$datetime = $_GET['datetime'];
if (!DateTime::createFromFormat('Y-m-d H:i:s', $datetime)) {
    header('Location: /dashboard?error=Invalid datetime format'); // Redirect with error if format is invalid
    exit();
}

// Extract booking time from the datetime string
$booking_time = date('H:i:s', strtotime($datetime));

// Check if the booking time is in the past or current time
$current_time = new DateTime();
$booking_time = new DateTime($datetime);
if ($booking_time <= $current_time) {
    header('Location: /dashboard?error=Cannot book past or current time slots'); // Redirect with error if time is invalid
    exit();
}

// Check for existing bookings for the specific date and time
$check_stmt = $conn->prepare("SELECT COUNT(*) FROM tokabookings WHERE DATE(booking_date) = DATE(?) AND booking_time = ?");
$booking_date = $booking_time->format('Y-m-d'); // Format booking date
$formatted_time = $booking_time->format('H:i:s'); // Format booking time
$check_stmt->bind_param("ss", $booking_date, $formatted_time); // Bind parameters
$check_stmt->execute(); // Execute the query
$check_stmt->bind_result($count); // Bind result to count variable
$check_stmt->fetch(); // Fetch the result
$check_stmt->close(); // Close the statement

// Check if the slot is already booked
if ($count > 0) {
    header('Location: /dashboard?error=Slot is already booked!'); // Redirect with error if slot is taken
    $conn->close(); // Close the database connection
    exit();
}

// Assign a random trainer from the list
$trainers = [
    "Alex Bateman",
    "Gerger Erdelyi",
    "Logan Johnson",
    "Duke Bailey",
    "Dawid Janicki",
    "Emily Parker",
    "David Rodriguez",
    "Rachel Kim",
    "Chris Stewart",
    "Maria Garcia"
];
$trainer = $trainers[array_rand($trainers)]; // Select a random trainer

// Insert the booking into the database
$stmt = $conn->prepare("INSERT INTO tokabookings (user_id, booking_date, booking_time, trainer_name) VALUES (?, ?, ?, ?)");
$formatted_booking_time = $booking_time->format('H:i:s'); // Format booking time for database
$stmt->bind_param("ssss", $_SESSION['user_id'], $datetime, $formatted_booking_time, $trainer); // Bind parameters
$stmt->execute(); // Execute the insert statement

// Check if the booking was successful
if ($stmt->affected_rows > 0) {
    header('Location: /dashboard?msg=Training session booked successfully!'); // Redirect with success message
} else {
    header('Location: /dashboard?error=Error booking training session'); // Redirect with error if booking failed
}

// Close the statement and database connection
$stmt->close();
$conn->close();
exit(); // Ensure no further code is executed