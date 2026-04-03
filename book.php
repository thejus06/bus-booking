<?php
session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; // SAVE CURRENT PAGE
    header("Location: login.php");
    exit();
}

include 'db.php';
$bus_id = $_GET['bus_id'];

// fetch booked seats
$booked = [];
$result = $conn->query("SELECT seat_number FROM bookings WHERE bus_id=$bus_id");

while($row = $result->fetch_assoc()){
    $seats = explode(",", $row['seat_number']);
    foreach($seats as $s){
        $booked[] = (int)$s;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Seat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Select Your Seat</h1>

    <form action="payment.php" method="POST">
        <input type="hidden" name="bus_id" value="<?php echo $bus_id; ?>">
        <input type="hidden" name="seat" id="seatInput">

        <!--SEAT GRID -->
        <div class="seat-grid" id="seats"></div>

        <p id="selectedText">Selected Seats: None</p>

        <br>
        <button type="submit">Confirm Booking</button>
    </form>
</div>
<script src="script.js"></script>

<script>
let bookedSeats = <?php echo json_encode($booked); ?>;
initSeats(bookedSeats);
</script>
</body>
</html>