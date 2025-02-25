<?php
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
page_starter();
?>

<div class="container-fluid">
    <!-- Hero Section -->
    <div class="jumbotron bg-success text-white mt-4 p-5 rounded">
        <h1 class="display-4">💪 High Protein Diet Planner</h1>
        <p class="lead">Your guide to maximizing protein intake</p>
        <hr class="my-4">
        <p>Discover protein-packed recipes, meal plans, and expert nutrition advice for muscle growth and recovery.</p>
    </div>

    <!-- Nutrition Tips -->
    <section class="bg-light p-4 rounded mb-5 shadow-sm">
        <h3 class="text-center mb-4">Essential Protein Tips</h3>
        <div class="row">
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item">✅ Aim for 1.6-2.2g of protein per kg of body weight</li>
                    <li class="list-group-item">✅ Include lean meats, eggs, and dairy in every meal</li>
                    <li class="list-group-item">✅ Use whey protein supplements for convenience</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item">✅ Space protein intake throughout the day</li>
                    <li class="list-group-item">✅ Consume protein within 30 minutes post-workout</li>
                    <li class="list-group-item">✅ Include both animal and plant protein sources</li>
                </ul>
            </div>
        </div>

        <!-- Weekly Meal Plan -->
        <div class="container-fluid">
            <section id="weekly-meal-plan" class="mb-5 mt-5">
                <h2 class="text-center mb-4">High-Protein Weekly Meal Plan</h2>
                <?php if (!isset($_SESSION['user_id']) || $_SESSION['membershiplevel'] === 'Free' || !$_SESSION['membershiplevel']): ?>
                    <div class="text-center py-5">
                        <i class="bi bi-lock-fill" style="font-size: 7rem;"></i>
                        <h4 class="mt-3">Upgrade your membership to view additional content</h4>
                        <a href="/buy" class="btn btn-primary mt-3">
                            <i class="bi bi-arrow-up-circle"></i> Upgrade Now
                        </a>
                    </div>
                <?php else: ?>
                    <div class="row">
                        <?php
                        $mealPlan = [
                            ['day' => 'Monday', 'class' => 'bg-primary', 'meals' => [
                                'Breakfast: Egg white omelet with turkey and cheese',
                                'Snack: Protein shake with banana',
                                'Lunch: Grilled chicken breast with quinoa',
                                'Dinner: Salmon with sweet potato'
                            ]],
                            ['day' => 'Tuesday', 'class' => 'bg-success', 'meals' => [
                                'Breakfast: Greek yogurt protein bowl',
                                'Snack: Tuna on rice cakes',
                                'Lunch: Turkey and egg wrap',
                                'Dinner: Lean beef stir-fry'
                            ]],
                            ['day' => 'Wednesday', 'class' => 'bg-info', 'meals' => [
                                'Breakfast: Protein pancakes',
                                'Snack: Cottage cheese with fruit',
                                'Lunch: Chicken and chickpea bowl',
                                'Dinner: White fish with quinoa'
                            ]],
                            ['day' => 'Thursday', 'class' => 'bg-warning', 'meals' => [
                                'Breakfast: Protein smoothie bowl',
                                'Snack: Hard-boiled eggs',
                                'Lunch: Lean beef burger',
                                'Dinner: Turkey meatballs'
                            ]],
                            ['day' => 'Friday', 'class' => 'bg-danger', 'meals' => [
                                'Breakfast: Protein oatmeal',
                                'Snack: Protein bar',
                                'Lunch: Tuna steak',
                                'Dinner: Chicken stir-fry'
                            ]],
                            ['day' => 'Saturday', 'class' => 'bg-secondary', 'meals' => [
                                'Breakfast: Protein waffles',
                                'Snack: Turkey roll-ups',
                                'Lunch: Shrimp and quinoa',
                                'Dinner: Lean pork tenderloin'
                            ]],
                            ['day' => 'Sunday', 'class' => 'bg-dark', 'meals' => [
                                'Breakfast: Egg and turkey scramble',
                                'Snack: Protein shake',
                                'Lunch: Chicken breast salad',
                                'Dinner: Baked cod with vegetables'
                            ]]
                        ];

                        foreach ($mealPlan as $day) {
                            echo '<div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header ' . $day['class'] . ' text-white">' . $day['day'] . '</div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">';
                            foreach ($day['meals'] as $meal) {
                                echo '<li class="list-group-item">' . $meal . '</li>';
                            }
                            echo '</ul>
                        </div>
                    </div>
                </div>';
                        }
                        ?>
                    </div>
            </section>

            <!-- Recipe Section -->
            <div class="container-fluid">
                <section id="recipe-section" class="mb-5">
                    <h2 class="text-center mb-4">High-Protein Recipes</h2>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Protein Power Bowl</h5>
                                    <p class="card-text">Grilled chicken, quinoa, eggs, and mixed vegetables with tahini sauce.</p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Prep time:</strong> 20 mins</li>
                                        <li class="list-group-item"><strong>Cook time:</strong> 25 mins</li>
                                        <li class="list-group-item"><strong>Protein:</strong> 45g</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Muscle Builder Salmon</h5>
                                    <p class="card-text">Baked salmon with quinoa and roasted vegetables.</p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Prep time:</strong> 15 mins</li>
                                        <li class="list-group-item"><strong>Cook time:</strong> 30 mins</li>
                                        <li class="list-group-item"><strong>Protein:</strong> 38g</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Turkey Power Stir-Fry</h5>
                                    <p class="card-text">Lean turkey with mixed vegetables in high-protein sauce.</p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Prep time:</strong> 15 mins</li>
                                        <li class="list-group-item"><strong>Cook time:</strong> 20 mins</li>
                                        <li class="list-group-item"><strong>Protein:</strong> 42g</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
    </section>
</div>
</div>
<?php endif; ?>
<?php
page_end();
?>