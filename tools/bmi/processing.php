<?php




if (isset($_POST['weight']) && isset($_POST['height'])) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include $_SERVER['DOCUMENT_ROOT'] . '/database.php';
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $height_in_meters = $height / 100; // Convert cm to meters
    $bmi = $weight / ($height_in_meters * $height_in_meters);
    $bmi = round($bmi, 1); // Round to 1 decimal place

    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO tokatracking (user_id, tracking_date, bmi, UserWeight, UserHeight) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    date_default_timezone_set('Europe/London');
    $tracking_date = date('Y-m-d H:i:s');
    $stmt->bind_param("isdss", $user_id, $tracking_date, $bmi, $weight, $height);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        header(sprintf('Location: ./?result=%s', $bmi));
        exit();
    } else {
        echo "<div class='mt-3 alert alert-danger'>Please provide weight, height, and BMI values</div>";
    }
}
