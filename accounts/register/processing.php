<?php

// Start session if it hasn't been started yet
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include necessary functions and database connection
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/database.php';

// Check if all required fields are set in the POST request
if (!isset($_POST['email'], $_POST['the_password'], $_POST['firstname'], $_POST['lastname'], $_POST['dob'])) {
    header("Location: ./?error=Missing required fields"); // Redirect with error message
    exit();
}

// Retrieve user input from POST request and trim whitespace from password
$user_email = $_POST['email'];
$user_password = trim($_POST['the_password']);
$confirm_password = trim($_POST["confirm_password"]);
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$dob = $_POST['dob'];
$teir = "Free"; // Set default membership level to Free

// Check database connection
if (!$conn || $conn->connect_error) {
    header("Location: /accounts/register?error=Database connection failed, please try again"); // Redirect with error message
    exit();
}

// Validate the email format
if (ValidateEmail($user_email) == false) {
    header('Location: /accounts/register?error="Invalid email address, please try again'); // Redirect with error message
    exit();
}

// Validate the password and confirm password
$password_validation = validatePassword($user_password, $confirm_password);
if ($password_validation !== true) {
    header('Location: /accounts/register?error=' . urlencode($password_validation)); // Redirect with error message
    exit();
}

// Validate the date of birth
$birthday_validation = validateDOB($dob);
if ($birthday_validation !== true) {
    header('Location: /accounts/register?error=' . urlencode($birthday_validation)); // Redirect with error message
    exit();
}

// Prepare SQL query to check if the email already exists in the database
$query = "SELECT * FROM tokausers WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $user_email); // Bind the email parameter
$stmt->execute(); // Execute the query
$result = $stmt->get_result(); // Get the result set

// Check if the email is already taken
if ($result->num_rows > 0) {
    header("Location: /accounts/register?error=Email was already taken"); // Redirect with error message
    exit();
}

// Capitalize the first and last names
$first_name = CapitaliseName($first_name);
$last_name = CapitaliseName($last_name);

// Hash the password for secure storage
$hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

// Prepare SQL query to insert the new user into the database
$insert_query = "INSERT INTO tokausers (LastName, FirstName, Email, UserPassword, Dob, MembershipLevel) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($insert_query);
$stmt->bind_param("ssssss", $last_name, $first_name, $user_email, $hashed_password, $dob, $teir); // Bind parameters

// Execute the insert query and check if successful
if ($stmt->execute()) {
    $the_id = $stmt->insert_id; // Get the ID of the newly inserted user
    auth_session($the_id); // Call the function to authenticate the session
}

// Redirect to the registration page with an error message if registration fails
header("Location: ./?error=Registration failed");
exit();
