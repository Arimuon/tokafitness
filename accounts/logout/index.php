<?php
// Start session if it hasn't been started yet
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Destroy the current session to log the user out
session_destroy();

// Redirect to the homepage after logging out
header("Location: /");
exit(); // Ensure no further code is executed