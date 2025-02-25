<?php

/**
 * This PHP file holds critical functions to the functioning of the website.
 * This allows me to only change a small portion of the overall code and the changes will happen across all pages.
 * I also use the functions to save time by not rewriting the same code over and over.
 */

// Function to start the page and initialize session
function page_starter()
{
    // Check if session is not started, then start it
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Output the HTML structure for the page
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="/assets/TokaLogos/favicon.ico">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="/assets/css/aos.min.css" rel="stylesheet">
        <title>ToKa Fitness</title>
    </head>
    <noscript>
        <div style="background-color: #f8d7da; color: #721c24; padding: 1rem; margin: 1rem; border: 1px solid #f5c6cb; border-radius: 0.25rem;">
            <p style="margin: 0;">Please enable JavaScript in your browser to ensure full functionality of this site.</p>
        </div>
    </noscript>
    <body>';

    // Navigation bar structure
    echo '<section id="navigation">
        <nav class="navbar navbar-expand-lg" style="background-color: #e0dcdc;">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><img src="/assets/TokaLogos/ToKa Fitness_transparent-.webp" alt="ToKa Fitness Logo" width="75"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pricing/">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about/#about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about/#support">Support</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Diet Plans
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/diets/vegan">Vegan</a></li>
                                <li><a class="dropdown-item" href="/diets/vegetarian">Vegetarian</a></li>
                                <li><a class="dropdown-item" href="/diets/protein">Max Protein</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Workouts
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/workouts/strength">Strength Training</a></li>
                                <li><a class="dropdown-item" href="/workouts/cardio">Cardio Training</a></li>
                            </ul>
                        </li>';

    // Check if user is logged in to display additional navigation options
    if (isset($_SESSION['user_id'])) {
        echo '<li class="nav-item dropdown me-4">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Tools
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/tools/bmi">BMI Calculator</a </li>
                                    <li><a class="dropdown-item" href="/tools/deficit">Calorie Deficit Calculator</a></li>
                                </ul>
                            </li>
                            <li class="nav-item me-3">
                                <a class="btn btn-primary" href="/dashboard">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn" style="background-color: black; color: white;" href="/accounts/logout">Log Out</a>
                            </li>';
    } else {
        echo '<li class="nav-item me-3">
                                <a class="btn btn-primary" href="/accounts/register">Start Your Journey</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn" style="background-color: black; color: white;" href="/accounts/login">Sign In</a>
                            </li>';
    }

    // Close the navigation bar
    echo '</ul>
                </div>
            </div>
        </nav>
    </section>';

    // Start the main content area
    echo '<main>';

    // Include necessary scripts for functionality
    echo '<script src="/assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>';
    echo '<script src="/assets/js/aos.min.js"></script>';
    echo '<script src="/assets/js/cookie.notice.min.js"></script>';
    echo '
    <script>
        new cookieNoticeJS({
            cookieNoticePosition: "bottom",
            expiresIn: 30
        });
    </script>';
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            AOS.init({
                disable: "phone, tablet, mobile",
            });
        });
    </script>';
}

// Function to start the member page and check session
function member_page_starter()
{
    // Start session if not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // Redirect to homepage if user is not logged in
    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] === "") {
        header('Location: /');
        exit();
    }
    // Call the page starter function
    page_starter();
}

// Function to embed a YouTube video based on the provided URL
function youtube_player($url)
{
    // Initialize video ID variable
    $video_id = '';

    // Check for standard YouTube URL with ?v= or &v=
    if (preg_match('/[?&]v=([^&#]+)/', $url, $match)) {
        $video_id = $match[1];
    }
    // Check for YouTube Shorts URL
    elseif (preg_match('/youtube\.com\/shorts\/([^\/?&]+)/', $url, $match)) {
        $video_id = $match[1];
    }
    // Check for shortened YouTube URL
    elseif (preg_match('/youtu\.be\/([^\/\?]+)/', $url, $match)) {
        $video_id = $match[1];
    }

    // Return the embed code if a valid video ID is found
    if (!empty($video_id)) {
        return '<div class="ratio ratio-1x1">
            <iframe src="https://www.youtube.com/embed/' . htmlspecialchars($video_id) . '" 
            title="YouTube video player" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen></iframe>
        </div>';
    }

    // Return an error message if no valid video ID is found
    return 'Invalid YouTube URL';
}

// Function to end the page and output footer
function page_end()
{
    // Close the main content area
    echo '</main>';
    // Output the footer section
    echo '<section id="footer" style="background-color: white;" class="mt-5">
        <div class="container">
            <footer class="row py-5 border-top">
                <!-- Logo Column -->
                <div class="col-12 col-md-3 mb-4 mb-md-0">
                    <a href="/" class="d-flex justify-content-center justify-content-md-start align-items-center link-body-emphasis text-decoration-none">
                        <img src="/assets/TokaLogos/ToKa Fitness_transparent-cropped.webp" 
                             alt="ToKa Logo" 
                             class="img-fluid"
                             style="max-width: 280px; height: auto;">
                    </a>
                </div>

                <!-- Content Columns -->
                <div class="col-6 col-md-2 offset-md-1 mb-3">
                    <h5>Quick Links</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="/" class="nav-link p-0 text-body-secondary">Home</a></li>
                        <li class="nav-item mb-2"><a href="/pricing/" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="/about/#about" class="nav-link p-0 text-body-secondary">About Us</a></li>
                        <li class="nav-item mb-2"><a href="/about/#support" class="nav-link p-0 text-body-secondary">Support</a></li>
                        <li class="nav-item mb-2"><a href="/accounts/register" class="nav-link p-0 text-body-secondary">Start Your Journey</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Diet Plans</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="/diets/vegan/" class="nav-link p-0 text-body-secondary">Vegan</a></li>
                        <li class="nav-item mb-2"><a href="/diets/vegetarian/" class="nav-link p-0 text-body-secondary">Vegetarian</a></li>
                        <li class="nav-item mb-2"><a href="/diets/protein/" class="nav-link p-0 text-body-secondary">Max Protein</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Workouts</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="/workouts/strength" class="nav-link p-0 text-body-secondary">Strength Training</a></li>
                        <li class="nav-item mb-2"><a href="/workouts/cardio" class="nav-link p-0 text-body-secondary">Cardio Training</a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </section>
    </body>
    </html>';
}

// Function to prevent access to a page if a user is already logged in
function anti_logged_in()
{
    // Start session if not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // Redirect logged-in users to the homepage
    if (isset($_SESSION['user_id'])) {
        header('Location: /');
        exit();
    }
}

// Function to authenticate and create a session for a user
function auth_session($id)
{
    // Include database connection
    include $_SERVER['DOCUMENT_ROOT'] . '/database.php';
    // Check if connection exists
    if (!$conn) {
        include $_SERVER['DOCUMENT_ROOT'] . '/database.php';
    }
    // Start session if not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Prepare and execute query to retrieve user data
    $query = "SELECT id, Email, UserPassword, MembershipLevel, FirstName, LastName, Dob FROM tokausers WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // If user data is found, create session variables and redirect to dashboard
    if ($row = $result->fetch_assoc()) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['email'] = $row['Email'];
        $_SESSION['membershiplevel'] = $row['MembershipLevel'];
        $_SESSION['first_name'] = $row['FirstName'];
        $_SESSION['last_name'] = $row['LastName'];
        $_SESSION['dob'] = $row['Dob'];
        header("Location: /dashboard/");
        exit();
    } else {
        // Redirect to homepage if user not found
        header("Location: /");
    }
}

// Function to add a welcome message based on the time of day
function welcome_user()
{
    // Set timezone and get current hour
    date_default_timezone_set('Europe/London');
    $hour = date('H');

    // Generate greeting based on time of day and user session
    if (isset($_SESSION['user_id'])) {
        if ($hour >= 5 && $hour < 12) {
            $greeting = "Good morning, " . $_SESSION['first_name'];
        } elseif ($hour >= 12 && $hour < 18) {
            $greeting = "Good afternoon, " . $_SESSION['first_name'];
        } else {
            $greeting = "Good evening, " . $_SESSION['first_name'];
        }
    } else {
        if ($hour >= 5 && $hour < 12) {
            $greeting = "Good morning!";
        } elseif ($hour >= 12 && $hour < 18) {
            $greeting = "Good afternoon!";
        } else {
            $greeting = "Good evening!";
        }
    }

    // Output the greeting message
    echo '<div class="container-fluid text-center" style="background-color: #b5a6d5; padding: 20px;">
        <h1 class="display-4">' . $greeting . '</h1>
    </div>';
}

// Function to get the latest BMI data for the user
function get_bmi_data()
{
    // Include database connection
    include $_SERVER['DOCUMENT_ROOT'] . '/database.php';

    // Get user ID from session
    $user_id = $_SESSION['user_id'];
    // Prepare and execute query to retrieve BMI data
    $query = "SELECT * FROM tokatracking WHERE user_id = ? ORDER BY tracking_date DESC LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Return the latest BMI or a message if not recorded
    if ($row = $result->fetch_assoc()) {
        return $row['bmi'];
    } else {
        return "No BMI recorded";
    }
}

// Function to get the latest weight data for the user
function get_weight_data()
{
    // Include database connection
    include $_SERVER['DOCUMENT_ROOT'] . '/database.php';

    // Get user ID from session
    $user_id = $_SESSION['user_id'];
    // Prepare and execute query to retrieve weight data
    $query = "SELECT * FROM tokatracking WHERE user_id = ? ORDER BY tracking_date DESC LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Return the latest weight or a message if not recorded
    if ($row = $result->fetch_assoc()) {
        return isset($row['UserWeight']) ? $row['UserWeight'] . ' kg' : "No weight recorded";
    } else {
        return "No weight recorded";
    }
}

// Function to get the latest height data for the user
function get_height_data()
{
    // Include database connection
    include $_SERVER['DOCUMENT_ROOT'] . '/database.php';

    // Get user ID from session
    $user_id = $_SESSION['user_id'];
    // Prepare and execute query to retrieve height data
    $query = "SELECT * FROM tokatracking WHERE user_id = ? ORDER BY tracking_date DESC LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Return the latest height or a message if not recorded
    if ($row = $result->fetch_assoc()) {
        return isset($row['UserHeight']) ? $row['UserHeight'] . ' cm' : "No height recorded";
    } else {
        return "No height recorded";
    }
}

// Function to check if the user has a paid membership
function paid_check()
{
    // Start session if not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Redirect to homepage if user is not logged in
    if (!isset($_SESSION['user_id'])) {
        header('Location: /');
        exit();
    } elseif (isset($_SESSION['user_id']) && $_SESSION['user_id'] == "") {
        header('Location: /');
        exit();
    }

    // Redirect if user has a free membership or isn't logged in
    if (!isset($_SESSION['membershiplevel']) || $_SESSION['membershiplevel'] == 'Free') {
        header('Location: /dashboard/?error=Please upgrade your membership to use this feature.');
        exit();
    }
}

// Function to validate email format
function ValidateEmail($email)
{
    // Check if the email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

// Function to capitalize the first letter of a name
function CapitaliseName($name)
{
    return ucfirst($name);
}

// Function to validate a number using the Luhn algorithm
function is_valid_luhn($number)
{
    $sum = 0;
    $flag = 0;
    // Loop through each digit in the number
    for ($i = strlen($number) - 1; $i >= 0; $i--) {
        $digit = intval($number[$i]);
        if ($flag) {
            $digit *= 2;
            if ($digit > 9) $digit -= 9; // Adjust if the doubled digit is greater than 9
        }
        $sum += $digit; // Add the digit to the sum
        $flag = !$flag; // Toggle the flag for the next digit
    }
    return ($sum % 10) == 0; // Return true if the sum is divisible by 10
}

// Function to validate password strength and match
function validatePassword($password, $confirm_password)
{
    // Trim and ensure UTF-8 encoding
    $password = trim(mb_convert_encoding($password, 'UTF-8', 'auto'));
    $confirm_password = trim(mb_convert_encoding($confirm_password, 'UTF-8', 'auto'));

    // Check password length
    if (mb_strlen($password) < 8) {
        return "Password must be at least 8 characters long"; // Return error if too short
    }

    // Validate complexity (uppercase, lowercase, number, special character)
    if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W])[A-Za-z\d\W]{8,}$/', $password)) {
        return "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character"; // Return error if complexity is not met
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        return "Passwords do not match"; // Return error if passwords do not match
    }

    return true; // Return true if all validations pass
}

// Function to validate date of birth
function validateDOB($dob)
{
    $birthDate = new DateTime($dob); // Create DateTime object from the provided date
    $today = new DateTime(); // Get today's date
    $age = $today->diff($birthDate)->y; // Calculate age

    // Check age restrictions
    if ($age < 14) {
        return "You must be at least 14 years old to register"; // Return error if underage
    } elseif ($age > 110) {
        return "Please enter a valid date of birth"; // Return error if age is unrealistic
    } else {
        return true; // Return true if age is valid
    }
}
