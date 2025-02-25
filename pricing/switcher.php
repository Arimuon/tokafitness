<?php
// Check if a session has not been started yet
if (session_status() == PHP_SESSION_NONE) {
    // Start a new session if none exists
    session_start();
}

// Check if the user is logged in by verifying the session variable
if (isset($_SESSION['user_id'])) {
    // User is logged in, redirect to the buy page
    header('Location: /buy');
    exit(); // Ensure no further code is executed after the redirect
} else {
    // User is not logged in, redirect to the registration page
    header('Location: /accounts/register');
    exit(); // Ensure no further code is executed after the redirect
}
