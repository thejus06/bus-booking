<?php include 'db.php'; ?>

<?php
$bus_id = $_POST['bus_id'];
$seats = $_POST['seat']; // "1,2,5"
$name = $_POST['name'];

$seatArray = explode(",", $seats);
$error = false;

// check duplicates
foreach ($seatArray as $s) {
    $check = $conn->query("SELECT * FROM bookings WHERE bus_id='$bus_id' AND FIND_IN_SET('$s', seat_number)");
    if ($check->num_rows > 0) {
        $error = true;
        break;
    }
}

$success = false;

if (!$error) {
    $sql = "INSERT INTO bookings (bus_id, seat_number, user_name)
            VALUES ('$bus_id', '$seats', '$name')";

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

        <a href="index.php">
            <button>Book Again</button>
        </a>
    </div>

<?php } else { ?>
    <h1 style="color:red;">❌ Seat already booked!</h1>
<?php } ?>

</div>

</body>
</html>