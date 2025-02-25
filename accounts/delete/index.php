<?php
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
member_page_starter();
?>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title text-danger">Delete Account</h3>
            <div class="alert alert-warning">
                <strong>Warning!</strong> This action cannot be undone. All your account information, fitness tracking data, and progress history will be permanently deleted.
            </div>
            <form action="processing.php" method="POST">
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="confirmDelete" name="confirmDelete" tabindex="1">
                    <label class="form-check-label" for="confirmDelete">
                        I understand that my account and all associated data will be permanently deleted
                    </label>
                </div>
                <button type="submit" class="btn btn-danger" name="deleteAccount" tabindex="2">Delete My Account</button>
                <a href="../dashboard" class="btn btn-secondary" tabindex="3">Cancel</a>
            </form>
        </div>
    </div>
</div>