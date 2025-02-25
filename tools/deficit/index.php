<?php
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
member_page_starter();
?>

<div class="container mt-5">
    <h1>Calorie Deficit Calculator</h1>
    <form id="deficitForm">
        <div class="mb-3">
            <label for="weight" class="form-label">Current Weight (kg)</label>
            <input type="number" class="form-control" id="weight" required>
        </div>
        <div class="mb-3">
            <label for="height" class="form-label">Height (cm)</label>
            <input type="number" class="form-control" id="height" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="activity" class="form-label">Activity Level</label>
            <select class="form-select" id="activity" required>
                <option value="1.2">Sedentary</option>
                <option value="1.375">Light Exercise</option>
                <option value="1.55">Moderate Exercise</option>
                <option value="1.725">Heavy Exercise</option>
                <option value="1.9">Athlete</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Calculate</button>
    </form>
    <div id="result" class="mt-4"></div>
</div>

<script>
    document.getElementById('deficitForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const weight = parseFloat(document.getElementById('weight').value);
        const height = parseFloat(document.getElementById('height').value);
        const age = parseInt(document.getElementById('age').value);
        const gender = document.getElementById('gender').value;
        const activity = parseFloat(document.getElementById('activity').value);

        let bmr;
        if (gender === 'male') {
            bmr = 10 * weight + 6.25 * height - 5 * age + 5;
        } else {
            bmr = 10 * weight + 6.25 * height - 5 * age - 161;
        }

        const tdee = bmr * activity;
        const deficit = tdee - 500;

        document.getElementById('result').innerHTML = `
        <h3>Results:</h3>
        <p>Your BMR: ${Math.round(bmr)} calories/day</p>
        <p>Your TDEE: ${Math.round(tdee)} calories/day</p>
        <p>Recommended calorie intake for weight loss: ${Math.round(deficit)} calories/day</p>
    `;
    });
</script>



<?php
page_end();
?>