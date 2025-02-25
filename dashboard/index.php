<?php
include $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
member_page_starter();
welcome_user();

// Ensure database connection is included
require '../database.php';

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Fetch the next upcoming training session
$query = "SELECT booking_date, booking_time, trainer_name FROM tokabookings 
          WHERE user_id = ? AND booking_date >= CURDATE() 
          ORDER BY booking_date ASC LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$booking = $result->fetch_assoc();
$stmt->close();
$conn->close();

// Only display the section if a session exists
if ($booking):
    $date = date("l, jS F Y", strtotime($booking['booking_date'])); // Format date
    $trainer = htmlspecialchars($booking['trainer_name']);
?>
    <section id="next-training">
        <div class="container mt-4" data-aos="fade-up">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header text-center bg-primary text-white">
                            <h3 class="mb-0">Your Next Training Session</h3>
                        </div>
                        <div class="card-body text-center">
                            <h4 class="text-primary"><i class="bi bi-calendar-check"></i> <?= $date ?></h4>
                            <p class="text-muted mb-2"><i class="bi bi-person-fill"></i> Trainer: <strong><?= $trainer ?></strong></p>
                            <p class="text-muted mb-2"><i class="bi bi-clock-fill"></i> Time: <strong><?= date('g:i A', strtotime($booking['booking_time'])) ?></strong></p>
                            <a href="/dashboard/bookings" class="btn btn-outline-primary mt-2">View All Bookings</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<section id="info">
    <div class="container mt-4" data-aos="zoom-in">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php if (isset($_GET['msg'])) : ?>
                    <div class="alert alert-success text-center">
                        <?php echo htmlspecialchars($_GET['msg']); ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($_GET['error'])) : ?>
                    <div class="alert alert-danger text-center">
                        <?php echo htmlspecialchars($_GET['error']); ?>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header" style="padding: 20px">
                        <h3>Account Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><i class="bi bi-person"></i> <strong>Name:</strong> <?php echo $_SESSION['first_name'];
                                                                                        echo " ";
                                                                                        echo $_SESSION['last_name'];   ?></p>
                                <p><i class="bi bi-envelope"></i> <strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
                                <p><i class="bi bi-calendar-heart"></i> <strong>Age:</strong> <?php
                                                                                                $dob = new DateTime($_SESSION['dob']);
                                                                                                $today = new DateTime();
                                                                                                $age = $today->diff($dob)->y;
                                                                                                echo $age;
                                                                                                ?> years</p>
                            </div>
                            <div class="col-md-6">
                                <p><i class="bi bi-star"></i> <strong>Membership Level:</strong> <?php echo $_SESSION['membershiplevel']; ?></p>
                                <p><i class="bi bi-calendar"></i> <strong>Date of Birth:</strong> <?php echo date('d F Y', strtotime($_SESSION['dob'])); ?></p>
                            </div>
                        </div>
                        <a href="/buy" class="btn btn-success me-2">
                            <i class="bi bi-arrow-up-circle"></i> Change Membership
                        </a>
                        <a href="/dashboard/update/?info" class="btn btn-primary me-2">
                            <i class="bi bi-pencil-square"></i> Update Information
                        </a>
                        <a href="/accounts/delete" class="btn btn-danger me-2">
                            <i class="bi bi-trash"></i> Delete Account
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="stats">
    <div class="container mt-4" data-aos="zoom-in">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php if (isset($_GET['msg2'])) : ?>
                    <div class="alert alert-success text-center">
                        <?php echo htmlspecialchars($_GET['msg2']); ?>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header" style="padding: 20px">
                        <h3>My Stats</h3>
                    </div>
                    <div class="card-body text-center">
                        <?php if (!isset($_SESSION['user_id']) || $_SESSION['membershiplevel'] === 'Free' || !$_SESSION['membershiplevel']): ?>
                            <div class="text-center py-5">
                                <i class="bi bi-lock-fill" style="font-size: 7rem;"></i>
                                <h4 class="mt-3">Upgrade your membership to view your stats</h4>
                                <a href="/buy" class="btn btn-primary mt-3">
                                    <i class="bi bi-arrow-up-circle"></i> Upgrade Now
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                    <ul class="list-unstyled">
                                        <li style="font-size: 1.7rem; margin: 10px 0;"><i class="bi bi-arrow-up-square"></i> <strong>Current BMI:</strong> <?php echo get_bmi_data(); ?></li>
                                        <li style="font-size: 1.7rem; margin: 10px 0;"><i class="bi bi-speedometer"></i> <strong>Current Weight:</strong> <?php echo get_weight_data(); ?></li>
                                        <li style="font-size: 1.7rem; margin: 10px 0;"><i class="bi bi-rulers"></i> <strong>Current Height:</strong> <?php echo get_height_data(); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="text-center mt-2">
                                <a href="/dashboard/update/?stats" class="btn btn-primary me-2">
                                    <i class="bi bi-pencil-square"></i> Update Stats
                                </a>
                                <a href="/dashboard/history/" class="btn btn-info">
                                    <i class="bi bi-clock-history"></i> View History
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="daily-calendar">
    <div class="container mt-4" data-aos="zoom-in">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header" style="padding: 20px">
                        <h3 class="mb-0">Personal Trainer Availability</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        require '../database.php';

                        // Get selected date or use today
                        $selectedDate = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
                        $currentDate = new DateTime($selectedDate);

                        // Get booked hours for selected date
                        $bookedHours = [];
                        $query = "SELECT HOUR(booking_time) AS hour, trainer_name 
                                FROM tokabookings 
                                WHERE booking_date = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("s", $selectedDate);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        while ($row = $result->fetch_assoc()) {
                            $hour = $row['hour'];
                            if (!isset($bookedHours[$hour])) {
                                $bookedHours[$hour] = [];
                            }
                            $bookedHours[$hour][] = $row['trainer_name'];
                        }

                        // Calculate previous and next dates
                        $prevDate = clone $currentDate;
                        $prevDate->modify('-1 day');
                        $nextDate = clone $currentDate;
                        $nextDate->modify('+1 day');
                        ?>

                        <div class="calendar-header d-flex justify-content-between align-items-center mb-4">
                            <a href="?date=<?= $prevDate->format('Y-m-d') ?>" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                            <h4 class="mb-0"><?= $currentDate->format('F j, Y') ?></h4>
                            <a href="?date=<?= $nextDate->format('Y-m-d') ?>" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </div>

                        <div class="time-slots-grid">
                            <?php
                            // Generate time slots from 6 AM to 10 PM
                            for ($hour = 6; $hour <= 22; $hour++) {
                                $time = date('g:i A', mktime($hour, 0));
                                $isBooked = isset($bookedHours[$hour]);
                                $isPast = (strtotime($selectedDate . ' ' . $hour . ':00') < time());
                                $slotClass = $isPast ? 'slot-past' : ($isBooked ? 'slot-booked' : 'slot-available');
                            ?>
                                <div class="time-slot <?= $slotClass ?>">
                                    <div class="slot-time"><?= $time ?></div>
                                    <?php if ($isBooked) { ?>
                                        <div class="slot-info">
                                            <small class="text-danger d-block fw-bold">Booked</small>
                                            <?php foreach ($bookedHours[$hour] as $trainer) { ?>
                                                <small class="text-muted d-block">with <?= htmlspecialchars($trainer) ?></small>
                                            <?php } ?>
                                        </div>
                                    <?php } elseif (!$isPast) { ?>
                                        <div class="slot-info">
                                            <a href="/dashboard/bookings/book?datetime=<?= urlencode($selectedDate . ' ' . sprintf('%02d:00:00', $hour)) ?>"
                                                class="btn btn-sm btn-success">Book Slot</a>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .time-slots-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
    }

    .time-slot {
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        padding: 1rem;
        text-align: center;
        transition: all 0.2s;
    }

    .slot-past {
        background-color: #f8f9fa;
        opacity: 0.6;
    }

    .slot-booked {
        background-color: #ffeef0;
        border-color: #ffdce0;
    }

    .slot-available {
        background-color: #f0fff4;
        border-color: #c3e6cb;
    }

    .slot-time {
        font-weight: bold;
        margin-bottom: 0.5rem;
    }
</style>

<?php
page_end();
?>