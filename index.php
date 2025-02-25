<?php
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
page_starter();
?>

<section id="welcome">
    <div class="container-fluid" style="background-color: #b5a6d5;">
        <div class="row justify-content-between align-items-center p-3 p-md-5">
            <!-- Text Column -->
            <div class="col-12 col-lg-6 order-2 order-lg-1 mt-4 mt-lg-0">
                <h1>Welcome to ToKa Fitness</h1>
                <p class="fs-6">Welcome to ToKa Fitness, your premier destination for achieving your fitness goals...</p>
                <p class="fs-6">Join our vibrant fitness community and experience transformation...</p>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="/accounts/register" class="btn btn-dark" style="max-width: 380px; width: 100%;">Start your fitness journey</a>
                </div>
            </div>

            <!-- Image Column -->
            <div class="col-12 col-lg-6 order-1 order-lg-2">
                <div class="position-relative" style="max-width: 800px; margin: 0 auto;">
                    <img class="img-fluid rounded-3" src="assets/topworkingout_optimised.webp" alt="Guy lifting barbell">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="workout-ad">
    <div class="container-fluid" style="background-color: #e0dcdc;">
        <div class="row justify-content-around p-3 p-md-5">
            <div class="col-12 col-md-6 align-self-auto">
                <h1>World Class Workouts</h1>
                <p class="fs-6">Discover our comprehensive range of workout programs designed to help you achieve your fitness goals. From weight loss to muscle building, our expert trainers create personalized plans that deliver results.</p>
                <p class="fs-6">Join our community of fitness enthusiasts and experience world-class facilities, state-of-the-art equipment, and motivating group sessions that make every workout count.</p>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="/workouts/strength" class="btn btn-dark" style="max-width: 380px; width: 100%;">Learn More <span>&#8594;</span></a>
                </div>
            </div>
            <div class="col-12 col-md-6 align-self-auto mt-4 mt-md-0" data-aos="zoom-in-left">
                <div class="row">
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="/assets/weight-loss-home.webp" class="card-img-top" alt="Workout Image 1" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Weight Loss</h5>
                                <p class="card-text">Transform your body with our specialized weight loss programs designed for sustainable results.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="/assets/weight-training-home.webp" class="card-img-top" alt="Workout Image 2" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Weight Training</h5>
                                <p class="card-text">Build strength and muscle with our comprehensive weight training programs and expert guidance.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="/assets/cardio-training-home.webp" class="card-img-top" alt="Workout Image 3" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Cardio Training</h5>
                                <p class="card-text">Boost your endurance and heart health with our dynamic cardio training sessions and programs.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="stats">
    <div class="container-fluid" style="background-color: #b5a6d5;">
        <div class="row justify-content-around p-3 p-md-5">
            <div class="col-6 col-md-3 text-center mb-4 mb-md-0">
                <h1><b>88%*</b></h1>
                <span>Members Stayed 1 Year Or More</span>
            </div>
            <div class="col-6 col-md-3 text-center mb-4 mb-md-0">
                <h1><b>87%*</b></h1>
                <span>Customer Goal Success Rate</span>
            </div>
            <div class="col-6 col-md-3 text-center mb-4 mb-md-0">
                <h1><b>15</b></h1>
                <span>Locations Nationally</span>
            </div>
            <div class="col-6 col-md-3 text-center mb-4 mb-md-0">
                <h1><b>23,770</b></h1>
                <span>Members Nationwide</span>
            </div>
        </div>
        <div class="col-12 mt-4 text-center">
            <span><i>* These statistics are based on small sample groups and are not verified.</i></span>
        </div>
    </div>
</section>

<section id="testimonial">
    <div class="container-fluid" style="background-color: #e0dcdc;">
        <div class="row justify-content-around p-3 p-md-5">
            <h2 class="text-center mt-3 mb-5">What Our Clients Say</h2>
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <p class="card-text">"Joining ToKa Fitness has been a game-changer for me. The workouts are intense and effective, and the community is incredibly supportive. Highly recommend for anyone serious about their fitness journey."</p>
                        <div class="d-flex align-items-center mt-3">
                            <img src="/assets/jane.png" width=50 alt="Client 1" class="rounded-circle me-3">
                            <div>
                                <h6 class="mb-0">Jane Smith</h6>
                                <small>Member</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <p class="card-text">"I have seen firsthand the positive impact ToKa Fitness has on my clients. The variety of workouts and diet plans available make it easy to tailor programs to individual needs."</p>
                        <div class="d-flex align-items-center mt-3">
                            <img src="/assets/john.png" width=50 alt="Client 2" class="rounded-circle me-3">
                            <div>
                                <h6 class="mb-0">John Smith</h6>
                                <small>Personal Trainer</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <p class="card-text">"As a Plus member at ToKa Fitness, I've experienced incredible results. The personalized workout plans and nutrition advice have helped me achieve my fitness goals faster than I ever thought possible."</p>
                        <div class="d-flex align-items-center mt-3">
                            <img src="/assets/alice.png" width=50 alt="Client 3" class="rounded-circle me-3">
                            <div>
                                <h6 class="mb-0">Alice Johnson</h6>
                                <small>Plus Member</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
page_end();
?>