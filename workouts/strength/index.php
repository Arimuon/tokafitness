<?php
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
page_starter();
welcome_user()
?>


<section id="introductions" style="background-color: #e0dcdc; padding: 20px;">
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h2>Introduction to Strength Training:</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="../../assets/lifting-intro1.webp" class="card-img-top" alt="Man with 6 pack curling 60kg barbell" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">What is strength training?</h5>
                        <p class="card-text">
                            Strength training exercises involve using resistance to induce muscular contraction,
                            which builds the strength, anaerobic endurance, and size of skeletal muscles. It is an important part of overall fitness and does many things for your body such as body fat loss, increasing lean muscle mass.
                        </p>
                        <span><i><a href="https://www.mayoclinic.org/healthy-lifestyle/fitness/in-depth/strength-training/art-20046670" target="_blank">Mayo Clinic, 2021</a></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="../../assets/lifting-intro2.webp" class="card-img-top" alt="Man with 6 pack curling 60kg barbell" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Why should you do strength training?</h5>
                        <p class="card-text">
                            <b>Strong bones:</b><br>
                            Aging and certain diseases and medications can cause bones to become weaker and more fragile over time, this can limit mobility and independence.
                            Strength exercises can work on bones as much as it does on muscles, making them stronger, therefore because your bone adapts by building more bone and becoming denser, these challenges can be avoided as you get older as it prevents falls and broken bones as a result of falls.
                            <br><span><i><a href="https://orthoinfo.aaos.org/en/staying-healthy/exercise-and-bone-health" target="_blank">American Academy of Orthopaedic Surgeons, 2020</a></i></span>
                        </p>
                        <p class="card-text">
                            <b>Weight Management:</b><br>
                            Strength training can help to lose weight as it increases your metabolism to burn more calories than it would normally.
                            <br><span><i><a href="https://www.mayoclinic.org/healthy-lifestyle/fitness/in-depth/strength-training/art-20046670" target="_blank">Mayo Clinic, 2021</a></i></span>
                        </p>
                        <p class="card-text">
                            <b>Quality Of Life:</b><br>
                            Resistance weight training has been shown to improve quality of life of older adults because resistance training
                            <br><span><i><a href="https://www.mayoclinic.org/healthy-lifestyle/fitness/in-depth/strength-training/art-20046670" target="_blank">Mayo Clinic, 2021</a></i></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="../../assets/lifting-intro3.webp" class="card-img-top" alt="Man with 6 pack curling 60kg barbell" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Safety in Strength Training</h5>
                        <p class="card-text">
                            Before starting any strength training program, it's crucial to understand proper form and technique.
                            Always start with lighter weights to master the movements, use proper breathing techniques, and ensure
                            you're maintaining good posture throughout each exercise. It's also recommended to work with a qualified
                            trainer initially to learn correct form and prevent injuries.
                        </p>
                        <span><i><a href="https://www.betterhealth.vic.gov.au/health/healthyliving/resistance-training-preventing-injury" target="_blank">Better Health Channel, 2012</a></i></span>
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
                    <h2>Strength Training Tutorials:</h2>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Safe Deadlift Techniques</h5>
                            <p class="card-text">
                                The deadlift is a fundamental strength training exercise,
                                this video demonstrates proper form and technique to perform deadlifts safely and effectively.
                            </p>
                            <?php echo (youtube_player('https://www.youtube.com/shorts/ZaTM37cfiDs')); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Dumbell Curl Techniques</h5>
                            <p class="card-text">
                                The dumbbell curl is a classic bicep exercise.
                                Learn proper form and technique to maximize muscle growth and prevent injury.
                                Watch this video for step-by-step guidance on performing dumbbell curls correctly.
                            </p>
                            <?php echo (youtube_player('https://youtube.com/shorts/803JIAWBj_c')); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Bench Press Techniques</h5>
                            <p class="card-text">
                                The bench press is a core upper body exercise. This video shows proper form and safety techniques to help you perform the bench press correctly and avoid common mistakes.
                            </p>
                            <?php echo (youtube_player('https://www.youtube.com/shorts/0cXAp6WhSj4')); ?>
                        </div>
                    </div>
                </div>
            </div>

            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </section>
<?php endif; ?>

<?php
page_end();
?>