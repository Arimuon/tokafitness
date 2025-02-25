<?php
// Check if the confirmDelete POST request is set
if (isset($_POST["confirmDelete"])) {
    // Start session if it hasn't been started yet
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Include necessary functions and database connection
    include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/database.php';

    // Get the user ID from the session
    $userid = $_SESSION['user_id'];

    // Prepare and execute the SQL statement to delete user's tracking data
    $stmt = $conn->prepare("DELETE FROM tokatracking WHERE user_id = ?");
    $stmt->bind_param("i", $userid); // Bind the user ID parameter
    $stmt->execute(); // Execute the deletion

    // Prepare and execute the SQL statement to delete the user's bookings
    $stmt = $conn->prepare("DELETE FROM tokabookings WHERE user_id = ?");
    $stmt->bind_param("i", $userid); // Bind the user ID parameter
    $stmt->execute(); // Execute the deletion

    // Prepare and execute the SQL statement to delete user data (deprecated)
    $stmt = $conn->prepare("DELETE FROM tokadata WHERE user_id = ?");
    $stmt->bind_param("i", $userid); // Bind the user ID parameter
    $stmt->execute(); // Execute the deletion

    // Prepare and execute the SQL statement to delete the user account
    $stmt = $conn->prepare("DELETE FROM tokausers WHERE id = ?");
    $stmt->bind_param("i", $userid); // Bind the user ID parameter
    $stmt->execute(); // Execute the deletion

    // Close the database connection
    $conn->close();

    // Destroy the session to log the user out
    session_destroy();

    // Redirect to the homepage after deletion
    header("Location: /");
    exit();
}
