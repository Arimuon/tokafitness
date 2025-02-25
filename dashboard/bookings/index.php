<?php
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
member_page_starter();
welcome_user();
?>

<section id="bookings">
    <div class="container mt-5" data-aos="fade-up">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">My Bookings</h3>
                        <a href="/dashboard#trainer-calendar" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-circle"></i> New Booking
                        </a>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_GET['msg'])) : ?>
                            <div class="alert alert-success text-center">
                                <?php echo htmlspecialchars($_GET['msg']); ?>
                            </div>
                        <?php endif; ?>

                        <?php
                        require '../../database.php';

                        $userId = $_SESSION['user_id']; // Assuming user ID is stored in session
                        $query = "SELECT id, booking_date, trainer_name, status, created_at, 
                                booking_time
                                FROM tokabookings
                                WHERE user_id = $userId
                                ORDER BY booking_date DESC";

                        $result = mysqli_query($conn, $query);

                        if (!$result) {
                            echo '<div class="alert alert-danger">Error fetching bookings: ' . mysqli_error($conn) . '</div>';
                        } else {
                            if (mysqli_num_rows($result) > 0) {
                        ?>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Trainer</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($booking = mysqli_fetch_assoc($result)) :
                                                $bookingDate = new DateTime($booking['booking_date']);
                                                $bookingTime = new DateTime($booking['booking_time']);
                                            ?>
                                                <tr>
                                                    <td><?php echo $bookingDate->format('D, M j, Y'); ?></td>
                                                    <td><?php echo $bookingTime->format('g:i A'); ?></td>
                                                    <td><?php echo htmlspecialchars($booking['trainer_name']); ?></td>
                                                    <td>
                                                        <?php
                                                        $statusClass = [
                                                            'confirmed' => 'success',
                                                            'pending' => 'warning',
                                                            'canceled' => 'danger',
                                                            'completed' => 'primary'
                                                        ][$booking['status']] ?? 'secondary';
                                                        ?>
                                                        <span class="badge bg-<?php echo $statusClass; ?>">
                                                            <?php echo ucfirst($booking['status']); ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <?php if ($booking['status'] === 'Confirmed') : ?>
                                                            <a href="/dashboard/bookings/cancel/?id=<?php echo $booking['id']; ?>"
                                                                class="btn btn-sm btn-outline-danger"
                                                                onclick="return confirm('Are you sure you want to cancel this booking?')">
                                                                Cancel
                                                            </a>
                                                        <?php endif; ?>
                                                        <!-- <a href="/dashboard/booking-details?id=<?php echo $booking['id']; ?>"
                                                            class="btn btn-sm btn-outline-info">
                                                            Details
                                                        </a> -->
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } else { ?>
                                <div class="text-center py-5">
                                    <i class="bi bi-calendar-x" style="font-size: 3rem;"></i>
                                    <h4 class="mt-3">No bookings found</h4>
                                    <p class="text-muted">You haven't made any bookings yet</p>
                                    <a href="/dashboard#trainer-calendar" class="btn btn-primary">
                                        <i class="bi bi-plus-circle"></i> Book a Session
                                    </a>
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.03);
        transform: translateX(5px);
        transition: all 0.2s ease;
    }

    .badge {
        font-size: 0.85em;
        padding: 0.5em 0.75em;
    }

    .table td,
    .table th {
        vertical-align: middle;
    }
</style>

<?php
page_end();
?>