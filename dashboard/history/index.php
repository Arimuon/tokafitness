<?php
// Include essential functions and start member session
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
paid_check();
member_page_starter(); // Ensures user is authenticated and starts page
?>
<!-- Load Chart.js for data visualization -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- BMI History Section -->
<div class="container mt-5">
    <div class="card" style="max-width: 800px; margin: 0 auto;">
        <div class="card-header">
            <h5 class="card-title mb-0">BMI History Chart</h5>
        </div>
        <div class="card-body">
            <canvas id="bmiChart"></canvas>
        </div>
    </div>
</div>

<!-- Weight History Section -->
<div class="container mt-5 mb-5">
    <div class="card" style="max-width: 800px; margin: 0 auto;">
        <div class="card-header">
            <h5 class="card-title mb-0">Weight History Chart</h5>
        </div>
        <div class="card-body">
            <canvas id="weightChart"></canvas>
        </div>
    </div>
</div>

<?php
// Fetch BMI data from database
include $_SERVER['DOCUMENT_ROOT'] . '/database.php';
$user_id = $_SESSION['user_id'];

// Prepare query to get BMI tracking history
$query = "SELECT bmi, tracking_date FROM tokatracking WHERE user_id = ? ORDER BY tracking_date ASC";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Process BMI data for chart
$dates = [];
$bmi_values = [];
while ($row = $result->fetch_assoc()) {
    // Format date to short format (e.g: "Jan 01")
    $dates[] = date('M j', strtotime($row['tracking_date']));
    // Handle potential null BMI values
    $bmi_values[] = isset($row['bmi']) ? $row['bmi'] : null;
}
?>

<!-- BMI Chart Initialization -->
<script>
    const ctx = document.getElementById('bmiChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($dates); ?>,
            datasets: [{
                label: 'BMI History',
                data: <?php echo json_encode($bmi_values); ?>,
                borderWidth: 2,
                borderColor: 'rgb(75, 192, 192)', // Teal color scheme
                tension: 0.1 // Smooth line curvature
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: false, // Auto-scale based on data
                    title: {
                        display: true,
                        text: 'BMI'
                    }
                }
            }
        }
    });
</script>

<?php
// Fetch Weight data from database
include $_SERVER['DOCUMENT_ROOT'] . '/database.php';
$user_id = $_SESSION['user_id'];

// Prepare query to get weight tracking history
$query = "SELECT UserWeight, tracking_date FROM tokatracking WHERE user_id = ? ORDER BY tracking_date ASC";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Process weight data for chart
$dates = [];
$weight_values = [];
while ($row = $result->fetch_assoc()) {
    $dates[] = date('M j', strtotime($row['tracking_date']));
    $weight_values[] = $row['UserWeight'];
}
?>

<!-- Weight Chart Initialization -->
<script>
    const weightCtx = document.getElementById('weightChart');

    new Chart(weightCtx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($dates); ?>,
            datasets: [{
                label: 'Weight History',
                data: <?php echo json_encode($weight_values); ?>,
                borderWidth: 2,
                borderColor: 'rgb(75, 192, 192)', // Matching teal color
                tension: 0.1 // Consistent line style
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: false,
                    title: {
                        display: true,
                        text: 'Kilograms' // Clear unit specification
                    }
                }
            }
        }
    });
</script>

<?php
// Include standard page footer/closure
page_end();
?>