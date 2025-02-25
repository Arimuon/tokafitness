<?php
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
page_starter();
?>

<div class="container-fluid">
    <!-- Hero Section -->
    <div class="jumbotron bg-success text-white mt-4 p-5 rounded">
        <h1 class="display-4">🌱 Vegan Diet Planner</h1>
        <p class="lead">Your guide to healthy plant-based eating</p>
        <hr class="my-4">
        <p>Discover delicious recipes, meal plans, and expert nutrition advice for a balanced vegan lifestyle.</p>
    </div>

    <!-- Nutrition Tips -->
    <section class="bg-light p-4 rounded mb-5 shadow-sm">
        <h3 class="text-center mb-4">Essential Nutrition Tips</h3>
        <div class="row">
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item">✅ Ensure adequate B12 intake through fortified foods or supplements</li>
                    <li class="list-group-item">✅ Include protein-rich foods like legumes, nuts, and tofu</li>
                    <li class="list-group-item">✅ Consume iron-rich foods with vitamin C for better absorption</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item">✅ Get omega-3s from flax seeds, chia seeds, and walnuts</li>
                    <li class="list-group-item">✅ Eat calcium-rich foods like fortified plant milk and leafy greens</li>
                    <li class="list-group-item">✅ Combine different plant proteins for complete amino acids</li>
                </ul>
            </div>
        </div>

        <!-- Weekly Meal Plan -->
        <div class="container-fluid">
            <section id="weekly-meal-plan" class="mb-5 mt-5">
                <h2 class="text-center mb-4">Weekly Meal Plan</h2>
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
                        <!-- Day cards here -->
                        <?php
                        $mealPlan = [
                            ['day' => 'Monday', 'class' => 'bg-primary', 'meals' => [
                                'Breakfast: Oatmeal with berries and nuts',
                                'Snack: Apple with almond butter',
                                'Lunch: Quinoa Buddha bowl',
                                'Dinner: Lentil curry with brown rice'
                            ]],
                            ['day' => 'Tuesday', 'class' => 'bg-success', 'meals' => [
                                'Breakfast: Tofu scramble',
                                'Snack: Mixed nuts and dried fruits',
                                'Lunch: Chickpea wrap',
                                'Dinner: Vegan pasta primavera'
                            ]],
                            ['day' => 'Wednesday', 'class' => 'bg-info', 'meals' => [
                                'Breakfast: Smoothie bowl',
                                'Snack: Hummus with carrots',
                                'Lunch: Bean and rice bowl',
                                'Dinner: Mushroom stir-fry'
                            ]],
                            ['day' => 'Thursday', 'class' => 'bg-warning', 'meals' => [
                                'Breakfast: Chia seed pudding',
                                'Snack: Trail mix',
                                'Lunch: Vegan black bean burger',
                                'Dinner: Sweet potato curry'
                            ]],
                            ['day' => 'Friday', 'class' => 'bg-danger', 'meals' => [
                                'Breakfast: Avocado toast',
                                'Snack: Green smoothie',
                                'Lunch: Tempeh sandwich',
                                'Dinner: Cauliflower rice stir-fry'
                            ]],
                            ['day' => 'Saturday', 'class' => 'bg-secondary', 'meals' => [
                                'Breakfast: Banana pancakes',
                                'Snack: Roasted chickpeas',
                                'Lunch: Vegan pizza',
                                'Dinner: Jackfruit tacos'
                            ]],
                            ['day' => 'Sunday', 'class' => 'bg-dark', 'meals' => [
                                'Breakfast: Vegan waffles',
                                'Snack: Fruit salad',
                                'Lunch: Mediterranean bowl',
                                'Dinner: Vegetable lasagna'
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
                    <h2 class="text-center mb-4">Featured Recipes</h2>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Quinoa Buddha Bowl</h5>
                                    <p class="card-text">A nutritious bowl with quinoa, roasted vegetables, and tahini dressing.</p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Prep time:</strong> 20 mins</li>
                                        <li class="list-group-item"><strong>Cook time:</strong> 25 mins</li>
                                        <li class="list-group-item"><strong>Calories:</strong> 450</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Lentil Curry</h5>
                                    <p class="card-text">Creamy coconut curry with red lentils, spinach, and aromatic spices.</p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Prep time:</strong> 15 mins</li>
                                        <li class="list-group-item"><strong>Cook time:</strong> 30 mins</li>
                                        <li class="list-group-item"><strong>Calories:</strong> 380</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Mushroom Stir-Fry</h5>
                                    <p class="card-text">Mixed mushrooms with vegetables in a savory ginger-soy sauce.</p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Prep time:</strong> 15 mins</li>
                                        <li class="list-group-item"><strong>Cook time:</strong> 20 mins</li>
                                        <li class="list-group-item"><strong>Calories:</strong> 300</li>
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