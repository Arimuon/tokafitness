<?php
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
page_starter();
?>

<section id="about" class="mb-5" data-aos="fade-up">
    <div class="container mt-5">
        <h1 class="text-center mb-4 display-4 fw-bold text-primary" data-aos="fade-down">About Us</h1>

        <!-- History Section -->
        <div class="row mb-5">
            <div class="col-12">
                <h3>Our History</h3>
                <p>Founded in 2020, ToKa Fitness has been committed to helping people achieve their fitness goals. Starting as a small local gym, we've grown into a comprehensive fitness center that focuses on personalized training and community wellness.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h3>Our Mission</h3>
                <p>At ToKa Fitness, we're dedicated to creating a welcoming environment where everyone can achieve their fitness goals. We believe in providing personalized attention, expert guidance, and state-of-the-art equipment to help our members succeed.</p>
            </div>
            <div class="col-md-6">
                <h3>Our Team</h3>
                <p>Our certified trainers and staff members are passionate about fitness and committed to your success. With years of experience and diverse expertise, we're here to support and guide you through your fitness journey.</p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="time-info mb-4">
                    <h4>Opening Hours</h4>
                    <p><i class="bi bi-clock-fill me-2"></i><strong>Mon-Fri:</strong> 6am-10pm</p>
                    <p><i class="bi bi-clock-fill me-2"></i><strong>Sat-Sun:</strong> 8am-8pm</p>

                    <!-- Social Media Links -->
                    <div class="social-media mt-4">
                        <h4>Follow Us</h4>
                        <div class="social-icons">
                            <a href="https://www.youtube.com/watch?v=xvFZjo5PgG0" class="me-3"><i class="bi bi-facebook fs-3"></i></a>
                            <a href="https://www.youtube.com/watch?v=xvFZjo5PgG0" class="me-3"><i class="bi bi-instagram fs-3"></i></a>
                            <a href="https://www.youtube.com/watch?v=xvFZjo5PgG0" class="me-3"><i class="bi bi-twitter fs-3"></i></a>
                            <a href="https://www.youtube.com/watch?v=xvFZjo5PgG0"><i class="bi bi-linkedin fs-3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="text-center">Location</h4>
                <div class="map-container"></div>
                <iframe src="https://www.google.com/maps/embed?pb=!4v1737477506221!6m8!1m7!1sDbXyA-Uovsdf66KtapfraQ!2m2!1d53.43950301535769!2d-2.230868641958913!3f16.672862524895276!4f0.9197227985459051!5f0.5977642575184178"
                    width="100%"
                    height="300"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
                <p class="mb-3 text-center">
                    <i class="bi bi-geo-alt-fill me-2"></i>
                    <strong>Head Office:</strong> 42 Victoria Road, Manchester, M14 6BQ
                </p>
            </div>
        </div>
    </div>
    </div>
</section>
<hr class="my-5 border-2 border-secondary opacity-50">
<section id="support" class="mb-5" data-aos="fade-up">
    <h1 class="text-center mb-4 display-4 fw-bold text-primary" data-aos="fade-down">Support Area</h1>
    <div class="container">
        <div class="row">
            <!-- FAQs Section -->
            <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
                <h3 class="text-center mb-4">Frequently Asked Questions</h3>

                <!-- FAQ 1 -->
                <div class="accordion mb-3" id="faqAccordion1">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" style="background-color: #FFCCCC; color: #000;">
                                How do I book a session?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse">
                            <div class="accordion-body" style="background-color: #FFE5E5; color: #000;">
                                You can book a session by contacting us directly via email or phone.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="accordion mb-3" id="faqAccordion2">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" style="background-color: #CCE5FF; color: #000;">
                                What are your opening hours?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse">
                            <div class="accordion-body" style="background-color: #E5F0FF; color: #000;">
                                We are open Monday to Friday 6am-10pm, and weekends 8am-8pm.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="accordion mb-3" id="faqAccordion3">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" style="background-color: #D4EDDA; color: #000;">
                                Do you offer personal training?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse">
                            <div class="accordion-body" style="background-color: #E9F7EA; color: #000;">
                                Yes, we have certified personal trainers available for one-on-one sessions. Plus members receive exclusive discounted rates for personal training.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="accordion mb-3" id="faqAccordion4">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" style="background-color: #FFF3CD; color: #000;">
                                What equipment do you have?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse">
                            <div class="accordion-body" style="background-color: #FFF9E6; color: #000;">
                                We offer a full range of cardio and strength training equipment, including free weights and resistance/cardio machines.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Information Section -->
            <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                <h3>Contact Information</h3>
                <div class="contact-details p-4">
                    <p class="mb-3">
                        <i class="bi bi-geo-alt-fill me-2"></i>
                        <strong>Head Office:</strong> 42 Victoria Road, Manchester, M14 6BQ
                    </p>
                    <p class="mb-3">
                        <i class="bi bi-envelope-fill me-2"></i>
                        <a href="mailto:contact@tokafitness.com">contact@tokafitness.com</a>
                    </p>
                    <p>
                        <i class="bi bi-telephone-fill me-2"></i>
                        <a href="tel:+441234567890">+44 123 456 7890</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
page_end();
?>