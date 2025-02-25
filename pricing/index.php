<?php
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
page_starter();
?>
<style>
    body {
        background-color: #b5a6d5;
    }
</style>


<section id="pricing">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 mb-3 mt-5 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm" data-aos="zoom-in" data-aos-delay="150">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal"><b>Standard</b></h4>
                    </div>
                    <div class="card-body">
                        <small>Starting At</small>
                        <h1 class="card-title pricing-card-title"><b>£20</b><small class="text-body-secondary fw-light"><b>/mo</b></small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li><i class="bi bi-check-lg"></i>Access 1 location at a time</li>
                            <li><i class="bi bi-check-lg"></i>2 group classes per month</li>
                            <li><i class="bi bi-check-lg"></i>Basic fitness assessment</li>
                            <li><i class="bi bi-check-lg"></i>Locker room access</li>
                        </ul>
                        <a href="switcher.php" class="w-100 btn btn-lg btn-outline-primary" tabindex="1">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-primary" data-aos="zoom-in">
                    <div class="card-header py-3 text-bg-primary border-primary">
                        <h4 class="my-0 fw-normal"><b>Plus</b></h4>
                    </div>
                    <div class="card-body">
                        <small>Starting At</small>
                        <h1 class="card-title pricing-card-title"><b>£30</b><small class="text-body-secondary fw-light"><b>/mo</b></small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li><i class="bi bi-check-lg"></i>Everything from Standard</li>
                            <li><i class="bi bi-check-lg"></i> Access to all locations</li>
                            <li><i class="bi bi-check-lg"></i> Unlimited group classes</li>
                            <li><i class="bi bi-check-lg"></i> Advanced fitness assessment</li>
                            <li><i class="bi bi-check-lg"></i> Discounted Personal trainer consultation</li>
                        </ul>
                        <a href="switcher.php" class="w-100 btn btn-lg btn-primary" style="color: white;" tabindex="2">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm" data-aos="zoom-in" data-aos-delay="150">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal"><b>Enterprise</b></h4>
                    </div>
                    <div class="card-body">
                        <small>Custom Pricing</small>
                        <h1 class="card-title pricing-card-title"><b>Contact Sales</b></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li><i class="bi bi-check-lg"></i> Customized solutions</li>
                            <li><i class="bi bi-check-lg"></i> Priority support</li>
                            <li><i class="bi bi-check-lg"></i> Dedicated account manager</li>
                            <li><i class="bi bi-check-lg"></i> Bulk pricing</li>
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-outline-primary" tabindex="3">Contact Sales</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id=" comparison">
    <div class="container">
        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th style="width: 34%;"></th>
                        <th style="width: 22%;">Standard</th>
                        <th style="width: 22%;">Plus</th>
                        <th style="width: 22%;">Enterprise</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="text-start">Access to Equipment</th>
                        <td><i class="bi bi-check-lg"></i></td>
                        <td><i class="bi bi-check-lg"></i></td>
                        <td><i class="bi bi-check-lg"></i></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Multiple Locations</th>
                        <td></td>
                        <td><i class="bi bi-check-lg"></i></td>
                        <td>Custom</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Group Classes</th>
                        <td>2/month</td>
                        <td>Unlimited</td>
                        <td>Custom</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Fitness Assessment</th>
                        <td>Basic</td>
                        <td>Advanced</td>
                        <td>Custom</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Personal Training</th>
                        <td>Full Price</td>
                        <td>Discounted</td>
                        <td>Custom</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Support</th>
                        <td></td>
                        <td><i class="bi bi-check-lg"></i></td>
                        <td><i class="bi bi-check-lg"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
</section>


<?php
page_end();
?>