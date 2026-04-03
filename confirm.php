<?php include 'db.php'; ?>
<?php session_start(); ?>

<?php
$bus_id = $_POST['bus_id'];
$seats = $_POST['seat']; // "1,2,5"
$name = $_SESSION['user'];
$user_id = $_SESSION['user_id'];

$seatArray = explode(",", $seats);
$error = false;

// check duplicate seats
foreach ($seatArray as $s) {
    $check = $conn->query("SELECT * FROM bookings WHERE bus_id='$bus_id' AND FIND_IN_SET('$s', seat_number)");
    if ($check->num_rows > 0) {
        $error = true;
        break;
    }
}

$success = false;

if (!$error) {
    $sql = "INSERT INTO bookings (bus_id, seat_number, user_name, user_id)
            VALUES ('$bus_id', '$seats', '$name', '$user_id')";

    if ($conn->query($sql)) {
        $success = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmed</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<?php if($success) { ?>
    <div class="success-box">
        <h1>✅ Booking Confirmed</h1>

        <div class="ticket">
            <h2>🎫 Ticket</h2>
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Seats:</strong> <?php echo $seats; ?></p>
            <p><strong>Bus ID:</strong> <?php echo $bus_id; ?></p>
        </div>

        <a href="history.php">
            <button>View My Bookings</button>
        </a>

        <a href="index.php">
            <button>Book Again</button>
        </a>
    </div>

<?php } else { ?>
    <h1 style="color:red;">❌ One or more seats already booked!</h1>
<?php } ?>

</div>

</body>
</html>