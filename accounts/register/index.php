<?php
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
anti_logged_in();
page_starter();
?>


<section id="sign-in-form" style="margin-top: 10px;">
    <div class="container-flex" style="max-width: 400px; margin: 0 auto;">
        <h2 class="text-center">Register</h2>
        <!-- <div class="alert alert-info mt-3">
            Password must contain at least 8 characters, including one uppercase letter, one lowercase letter, one number, and one special character.
        </div> -->
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>
        <form method="post" action="/accounts/register/processing.php">
            <div class="form-group">
                <label for="firstname">First Name: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="firstname" name="firstname" required autofocus tabindex="1">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="lastname" name="lastname" required autofocus tabindex="1">
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth: <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="dob" name="dob" required autofocus tabindex="1">
            </div>
            <div class="form-group">
                <label for="email">Email: <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" required autofocus tabindex="1">
            </div>
            <div class="form-group">
                <label for="password">Password: <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="the_password" name="the_password" required tabindex="2">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password: <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required tabindex="3">
            </div>
            <button style="margin-top: 10px;" type="submit" class="btn btn-primary btn-block mb-3" tabindex="3">Register</button>
            <p class="text-center"><i>Already have an account? <a href="/accounts/login" tabindex="4">Login</a></i></p>
        </form>
    </div>
</section>

<?php
page_end();
?>