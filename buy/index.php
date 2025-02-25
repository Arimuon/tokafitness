<?php
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
member_page_starter();
?>

<section id="membership-choice">
    <div class="container mt-5">
        <?php if (isset($_GET['error'])) : ?>
            <div class="alert alert-danger text-center">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>
        <h2>Select Membership</h2>
        <form action="/buy/processing.php" method="post">
            <div class="form-group mb-4">
                <select name="membership" class="form-control" required>
                    <option value="">Choose your membership...</option>
                    <option value="Plus">Plus - £30/month</option>
                    <option value="Standard">Standard - £20/month</option>
                    <option value="Free">Free - £0/month</option>
                </select>
            </div>

            <h2>Payment Information</h2>
            <div class="form-group mb-3">
                <label for="cardNumber">Card Number</label>
                <input type="password" class="form-control" id="cardNumber" name="cardNumber" pattern="\d{16}" maxlength="16" placeholder="Enter 16-digit card number" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="expiry">Expiry Date (MM/YY)</label>
                    <input type="date" class="form-control" id="expiry" name="expiry" placeholder="MM/YY" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cvv">CVV</label>
                    <input type="password" class="form-control" id="cvv" name="cvv" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Continue</button>
        </form>
    </div>
</section>

<?php
page_end();
?>