<?php
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
anti_logged_in();
page_starter();



?>


<section id="sign-in-form" style="margin-top: 10px;">
    <div class="container-flex" style="max-width: 400px; margin: 0 auto;">
        <h2 class="text-center">Login</h2>
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>
        <form method="post" action="/accounts/login/processing.php">
            <div class="form-group">
                <label for="email">Email: <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" required autofocus tabindex="1">
            </div>
            <div class="form-group">
                <label for="password">Password: <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="the_password" name="the_password" required tabindex="2">
            </div>
            <button style="margin-top: 10px;" type="submit" class="btn btn-primary btn-block" tabindex="3">Login</button>
            <p class="text-center"><i>Don't have an account? <a href="/accounts/register" tabindex="4">Register</a></i></p>
        </form>
    </div>
</section>

<?php
page_end();
?>