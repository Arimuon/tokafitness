<?php
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
page_starter();
?>

<div class="container-fluid">
    <!-- Hero Section -->
    <div class="jumbotron bg-success text-white mt-4 p-5 rounded">
        <h1 class="display-4">🥗 Vegetarian Diet Planner</h1>
        <p class="lead">Your guide to healthy vegetarian eating</p>
        <hr class="my-4">
        <p>Discover delicious vegetarian recipes, meal plans, and expert nutrition advice for a balanced lifestyle.</p>
    </div>

    <!-- Nutrition Tips -->
    <section class="bg-light p-4 rounded mb-5 shadow-sm">
        <h3 class="text-center mb-4">Essential Nutrition Tips</h3>
        <div class="row">
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item">✅ Include diverse protein sources like eggs, dairy, and legumes</li>
                    <li class="list-group-item">✅ Ensure adequate iron intake through leafy greens and fortified foods</li>
                    <li class="list-group-item">✅ Consume vitamin B12 through dairy products and eggs</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item">✅ Get omega-3s from eggs, dairy, and plant sources</li>
                    <li class="list-group-item">✅ Include calcium-rich dairy products and leafy greens</li>
                    <li class="list-group-item">✅ Balance meals with whole grains and plenty of vegetables</li>
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
                        <?php
                        $mealPlan = [
                            ['day' => 'Monday', 'class' => 'bg-primary', 'meals' => [
                                'Breakfast: Greek yogurt parfait with granola',
                                'Snack: Cheese and crackers',
                                'Lunch: Caprese sandwich',
                                'Dinner: Vegetable lasagna'
                            ]],
                            ['day' => 'Tuesday', 'class' => 'bg-success', 'meals' => [
                                'Breakfast: Vegetarian omelet',
                                'Snack: Trail mix with nuts',
                                'Lunch: Spinach and feta quiche',
                                'Dinner: Black bean enchiladas'
                            ]],
                            ['day' => 'Wednesday', 'class' => 'bg-info', 'meals' => [
                                'Breakfast: Cottage cheese with fruit',
                                'Snack: Hummus with pita',
                                'Lunch: Greek salad with feta',
                                'Dinner: Eggplant parmesan'
                            ]],
                            ['day' => 'Thursday', 'class' => 'bg-warning', 'meals' => [
                                'Breakfast: Egg and cheese sandwich',
                                'Snack: Yogurt smoothie',
                                'Lunch: Vegetable stir-fry with tofu',
                                'Dinner: Mushroom risotto'
                            ]],
                            ['day' => 'Friday', 'class' => 'bg-danger', 'meals' => [
                                'Breakfast: Pancakes with fruit',
                                'Snack: Cheese sticks',
                                'Lunch: Veggie burger',
                                'Dinner: Spinach and ricotta pasta'
                            ]],
                            ['day' => 'Saturday', 'class' => 'bg-secondary', 'meals' => [
                                'Breakfast: Eggs Benedict',
                                'Snack: Fruit and nuts',
                                'Lunch: Grilled cheese and soup',
                                'Dinner: Stuffed bell peppers'
                            ]],
                            ['day' => 'Sunday', 'class' => 'bg-dark', 'meals' => [
                                'Breakfast: French toast',
                                'Snack: Vegetable crudités',
                                'Lunch: Mediterranean platter',
                                'Dinner: Cheese and vegetable pizza'
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
                                    <h5 class="card-title">Spinach and Ricotta Lasagna</h5>
                                    <p class="card-text">Layers of pasta, creamy ricotta, spinach, and tomato sauce.</p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Prep time:</strong> 30 mins</li>
                                        <li class="list-group-item"><strong>Cook time:</strong> 45 mins</li>
                                        <li class="list-group-item"><strong>Calories:</strong> 520</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Eggplant Parmesan</h5>
                                    <p class="card-text">Crispy breaded eggplant with marinara and melted mozzarella.</p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Prep time:</strong> 25 mins</li>
                                        <li class="list-group-item"><strong>Cook time:</strong> 35 mins</li>
                                        <li class="list-group-item"><strong>Calories:</strong> 420</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Mushroom Risotto</h5>
                                    <p class="card-text">Creamy arborio rice with mixed mushrooms and parmesan.</p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Prep time:</strong> 15 mins</li>
                                        <li class="list-group-item"><strong>Cook time:</strong> 30 mins</li>
                                        <li class="list-group-item"><strong>Calories:</strong> 480</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
<?php endif; ?>
<?php
page_end();
?>