<?php

// Start session if it hasn't been started yet
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include necessary functions and database connection
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/database.php';

// Retrieve user email and password from POST request
$user_email = $_POST['email'];
$user_password = $_POST['the_password'];

// Prepare SQL query to select user details based on email
$query = "SELECT id, Email, UserPassword FROM tokausers WHERE Email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $user_email); // Bind the email parameter
$stmt->execute(); // Execute the query
$result = $stmt->get_result(); // Get the result set

// Check if no user was found with the provided email
if ($result->num_rows == 0) {
    header("Location: ./?error=Invalid Login Details"); // Redirect with error message
    exit();
}

// Fetch the user data if a user was found
if ($row = $result->fetch_assoc()) {
    // Verify the provided password against the hashed password in the database
    if (password_verify($user_password, $row['UserPassword'])) {
        auth_session($row['id']); // Call the function to authenticate the session
        exit();
    }
}

// Redirect to the login page with an error message if password verification fails
header("Location: ./?error=An error occurred please try again");
exit();
