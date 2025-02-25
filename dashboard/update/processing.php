<?php
// Check if the 'stats' parameter is set in the URL
if (isset($_GET['stats'])) {
    // Include database connection
    include $_SERVER['DOCUMENT_ROOT'] . '/database.php';

    // Start session if it hasn't been started yet
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Check if weight, height, and BMI are set in the POST request
    if (isset($_POST['weight']) && isset($_POST['height']) && isset($_POST['bmi'])) {
        // Retrieve user input from POST request
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $bmi = $_POST['bmi'];

        // Get the user ID from the session
        $user_id = $_SESSION['user_id'];
        

        // Prepare SQL query to insert tracking information into the database
        $sql = "INSERT INTO tokatracking (user_id, tracking_date, bmi, UserWeight, UserHeight) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Set the timezone and get the current tracking date
        date_default_timezone_set('Europe/London');
        $tracking_date = date('Y-m-d H:i:s');

        // Bind parameters and execute the query
        $stmt->bind_param("isdss", $user_id, $tracking_date, $bmi, $weight, $height);
        $stmt->execute();
        $conn->close(); // Close the database connection

        // Check if the insert was successful and redirect with a message
        if ($stmt->affected_rows > 0) {
            header("Location: /dashboard?msg=Your tracking information has been successfully updated.");
        } else {
            header("Location: /dashboard?msg=Error updating tracking information.");
        }
    }
}
// Check if the 'info' parameter is set in the URL
elseif (isset($_GET['info'])) {
    // Include database connection and functions
    include $_SERVER['DOCUMENT_ROOT'] . '/database.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';

    // Start session if it hasn't been started yet
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Check if all required fields are set in the POST request
    if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['dob']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
        // Retrieve user input from POST request
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate the password and confirm password
        $password_validation = validatePassword($password, $confirm_password);
        if ($password_validation !== true) {
            header('Location: /dashboard/update?info&error=' . urlencode($password_validation)); // Redirect with error message
            exit(); // Ensure no further code is executed
        }

        // Validate the date of birth
        $birthday_validation = validateDOB($dob);
        if ($birthday_validation !== true) {
            header('Location: /dashboard/update?info&error=' . urlencode($birthday_validation)); // Redirect with error message
            exit(); // Ensure no further code is executed
        }

        // Hash the password for secure storage
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Capitalize the first and last names
        $first_name = CapitaliseName($first_name);
        $last_name = CapitaliseName($last_name);

        // Get the user ID from the session
        $user_id = $_SESSION['user_id'];

        // Prepare SQL query to update user information in the database
        $sql = "UPDATE tokausers SET LastName = ?, FirstName = ?, Email = ?, UserPassword = ?, Dob = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $last_name, $first_name, $email, $hashed_password, $dob, $user_id); // Bind parameters
        $stmt->execute(); // Execute the update query
        $conn->close(); // Close the database connection

        // Check if the update was successful
        if ($stmt->affected_rows > 0) {
            session_destroy(); // Destroy the current session
            if (session_status() == PHP_SESSION_NONE) {
                session_start(); // Start a new session
            }
            auth_session($user_id); // Call the function to authenticate the session
            header("Location: /dashboard?msg=Your account information has been successfully updated."); // Redirect with success message
        } else {
            header("Location: /dashboard/update?info&error=Error updating account information."); // Redirect with error message
        }
    }
} else {
    // Redirect to the update page with an error message if no valid parameters are set
    header("Location: /dashboard/update?info&error=An error occurred, please retry.");
}
