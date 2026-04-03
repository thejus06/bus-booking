<?php include 'db.php'; ?>

<?php
$bus_id = $_POST['bus_id'];
$seat = $_POST['seat'];
$name = $_POST['name'];

$sql = "INSERT INTO bookings (bus_id, seat_number, user_name)
        VALUES ('$bus_id', '$seat', '$name')";

$success = false;

if ($conn->query($sql) === TRUE) {
    $success = true;
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
        <p>Your futuristic journey is locked 🚀</p>

        <div class="ticket">
            <h2>🎫 Ticket Details</h2>
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Seat:</strong> <?php echo $seat; ?></p>
            <p><strong>Bus ID:</strong> <?php echo $bus_id; ?></p>
        </div>

        <a href="index.php">
            <button>Book Another</button>
        </a>
    </div>

<?php } else { ?>
    <h1>❌ Booking Failed</h1>
<?php } ?>

</div>

</body>
</html>