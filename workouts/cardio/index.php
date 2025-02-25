<?php
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
page_starter();
welcome_user();
?>

<section id="introductions" style="background-color: #e0dcdc; padding: 20px;">
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h2>Introduction to Cardio Training:</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="../../assets/cardio-training-home.webp" class="card-img-top" alt="Lady and man on wind bike" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">What is Cardio training?</h5>
                        <p class="card-text">
                            Cardiovascular training, or cardio, involves exercises that raise your heart rate and breathing.
                            These exercises strengthen your heart and lungs, improve endurance, and help burn calories. Common cardio activities include running, cycling, swimming, and high-intensity interval training (HIIT).
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="../../assets/weight-loss-home.webp" class="card-img-top" alt="Lady and man running in a park" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Why should you do Cardio training?</h5>
                        <p class="card-text">
                            <b>Heart Health:</b><br>
                            Regular cardio exercise strengthens your heart, lowers blood pressure, and improves circulation.
                        </p>
                        <p class="card-text">
                            <b>Weight Management:</b><br>
                            Cardio burns calories efficiently and helps maintain a healthy weight when combined with proper nutrition.
                        </p>
                        <p class="card-text">
                            <b>Mental Health:</b><br>
                            Cardio exercise releases endorphins, reducing stress and improving mood and sleep quality.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="../../assets/lifting-intro3.webp" class="card-img-top" alt="Person running on treadmill" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Safety in Cardio Training</h5>
                        <p class="card-text">
                            Start slowly and gradually increase intensity. Always warm up before exercise and cool down after.
                            Stay hydrated and listen to your body. If you have any health conditions, consult your doctor before
                            starting a new cardio routine. Proper shoes and equipment are essential for injury prevention.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if (!isset($_SESSION['user_id']) || $_SESSION['membershiplevel'] === 'Free' || !$_SESSION['membershiplevel']): ?>
    <div class="text-center py-5">
        <i class="bi bi-lock-fill" style="font-size: 7rem;"></i>
        <h4 class="mt-3">Upgrade your membership to view additional content</h4>
        <a href="/buy" class="btn btn-primary mt-3">
            <i class="bi bi-arrow-up-circle"></i> Upgrade Now
        </a>
    </div>
<?php else: ?>
    <section id="tutorials" style="background-color: #b5a6d5; padding: 20px;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Cardio Training Tutorials:</h2>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Treadmill Running Form</h5>
                            <p class="card-text">
                                Running on a treadmill is a popular cardio exercise.
                                This video demonstrates proper form and technique to maximize your treadmill workout safely and effectively.
                            </p>
                            <?php echo (youtube_player('https://youtube.com/shorts/YY1QPNyvjBs')); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jump Rope Techniques</h5>
                            <p class="card-text">
                                Jump rope is an excellent cardio exercise that improves coordination and burns calories.
                                Learn proper form and technique to get the most out of your jump rope workout.
                            </p>
                            <?php echo (youtube_player('https://youtube.com/shorts/lMtc_3pf1A0')); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">High Intensity Interval Training</h5>
                            <p class="card-text">
                                HIIT workouts are effective for burning fat and improving cardiovascular fitness. This video shows proper form for basic HIIT exercises to help you get started safely.
                            </p>
                            <?php echo (youtube_player('https://youtube.com/shorts/OWymTwHZeC4')); ?>
                        </div>
                    </div>
                </div>
            </div>

            <br><br><br><br><br><br><br><br><br><br>


    </section>
<?php endif; ?>

<?php
page_end();
?>