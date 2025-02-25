<?php
// Double-check session status and start if needed
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include essential dependencies
include '../database.php';
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';

// Validate user authentication
if (!isset($_SESSION['user_id'])) {
    header("Location: /");
    exit();
}

// Verify all required payment fields exist
if (!isset($_POST['cardNumber'], $_POST['expiry'], $_POST['cvv'])) {
    header("Location: /buy?error=Missing payment details");
    exit();
}

// Sanitize and store payment details
$cardNumber = $_POST['cardNumber'];
$expiry = $_POST['expiry'];
$cvv = $_POST['cvv'];

// Validate card number format
if (!preg_match('/^\d{16}$/', $cardNumber)) {
    header("Location: /buy?error=Invalid card number");
    exit();
}

// Validate card using Luhn algorithm
if (!is_valid_luhn($cardNumber)) {
    header("Location: /buy?error=Invalid card number");
    exit();
}

// Process membership upgrade if selected
if (isset($_POST['membership'])) {
    $membershiptype = $_POST['membership'];

    // Prevent redundant membership updates
    if ($_SESSION['membershiplevel'] === $membershiptype) {
        header("Location: /buy?error=You already have this membership type");
        exit();
    }

    // Prepare database update
    $user_id = $_SESSION['user_id'];
    $sql = "UPDATE tokausers SET MembershipLevel = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Error handling for database preparation
    if (!$stmt) {
        header("Location: /buy?error=System error (DB-PREP)");
        exit();
    }

    // Bind parameters and execute
    $stmt->bind_param("ss", $membershiptype, $user_id);
    if (!$stmt->execute()) {
        header("Location: /buy?error=System error (DB-EXEC)");
        exit();
    }

    // Verify successful update
    $affected = $stmt->affected_rows;
    $stmt->close();
    $conn->close();

    if ($affected === 1) {
        // Refresh session data after update
        session_destroy();
        session_start();
        auth_session($user_id);

        // Redirect with success notification
        header("Location: /buy?success=Membership upgraded successfully");
        exit();
    }

    // Handle unexpected database response
    header("Location: /buy?error=Update verification failed");
    exit();
}
