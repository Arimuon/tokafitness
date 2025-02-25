<?php
if (isset($_GET['stats'])) {
    include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
    member_page_starter();
    echo '
    <div class="container mt-5">
        <form action="/dashboard/update/processing.php?stats" method="post">
            <div class="mb-3">
                <label for="weight" class="form-label">Weight (kg)</label>
                <input type="number" class="form-control" id="weight" name="weight" step="0.1" required>
            </div>
            <div class="mb-3">
                <label for="height" class="form-label">Height (cm)</label>
                <input type="number" class="form-control" id="height" name="height" step="1" required>
            </div>
            <div class="mb-3">
                <label for="bmi" class="form-label">BMI</label>
                <input type="number" class="form-control" id="bmi" name="bmi" step="0.1" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Stats</button>
        </form>
    </div>
    ';
} elseif (isset($_GET['info'])) {
    include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
    member_page_starter();
    echo '
    <div class="container mt-5">';
    if (isset($_GET['error'])) {
        echo '<div class="alert alert-danger text-center">' . htmlspecialchars($_GET['error']) . '</div>';
    }
    echo '
        <form action="/dashboard/update/processing.php?info" method="post">
            <div class="mb-3">
                <label for="fname" class="form-label">First Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="fname" name="fname" value="' . $_SESSION['first_name'] . '" required>
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="lname" name="lname" value="' . $_SESSION['last_name'] . '" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" value="' . $_SESSION['email'] . '" required>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="dob" name="dob" value="' . $_SESSION['dob'] . '" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Information</button>
        </form>
    </div>
    ';
} else {
    header('Location: /dashboard');
}
