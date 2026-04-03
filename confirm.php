<?php include 'db.php'; ?>

<?php
$bus_id = $_POST['bus_id'];
$seat = $_POST['seat'];
$name = $_POST['name'];

$sql = "INSERT INTO bookings (bus_id, seat_number, user_name)
        VALUES ('$bus_id', '$seat', '$name')";

if ($conn->query($sql) === TRUE) {
    echo "Booking Successful!";
} else {
    echo "Error: " . $conn->error;
}
?>