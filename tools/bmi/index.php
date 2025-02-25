<?php
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
paid_check();
member_page_starter();
?>
<div class="container mt-5">
    <?php
    if (isset($_GET['result'])) {
        echo "<div class='mt-3 alert alert-success'>Your BMI data has been saved successfully!</div>";
    }
    ?>
    <h2>BMI Calculator</h2>
    <form method="post" action="/tools/bmi/processing.php">
        <div class="form-group mb-2">
            <label for="weight">Weight (kg)</label>
            <input type="number" step="0.1" class="form-control" id="weight" name="weight" required>
        </div>
        <div class="form-group mb-3">
            <label for="height">Height (cm)</label>
            <input type="number" step="0.01" class="form-control" id="height" name="height" required>
        </div>
        <button type="submit" class="btn btn-primary">Calculate BMI</button>
    </form>
    <?php
    if (isset($_GET['result'])) {
        $bmi = $_GET['result'];
        echo "<div class='mt-3 alert alert-info'>";
        echo "Your BMI is: " . number_format($bmi, 2);
        echo "<br>Category: ";
        if ($bmi < 18.5) echo "Underweight";
        else if ($bmi < 25) echo "Normal weight";
        else if ($bmi < 30) echo "Overweight";
        else echo "Obese";
        echo "</div>";
    }
    ?>
</div>
<?php
page_end();
?>