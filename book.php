<?php
include 'db.php';
$bus_id = $_GET['bus_id'];

// fetch booked seats
$booked = [];
$result = $conn->query("SELECT seat_number FROM bookings WHERE bus_id=$bus_id");
while($row = $result->fetch_assoc()){
    $booked[] = (int)$row['seat_number'];
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

    <form action="confirm.php" method="POST">
        <input type="hidden" name="bus_id" value="<?php echo $bus_id; ?>">
        <input type="hidden" name="seat" id="seatInput">

        <div class="seat-grid" id="seats"></div>

        <br>
        <input type="text" name="name" placeholder="Your Name" required><br><br>

        <button type="submit">Confirm Booking</button>
    </form>
</div>

<script>
let bookedSeats = <?php echo json_encode($booked); ?>;

let seatsDiv = document.getElementById("seats");

for (let i = 1; i <= 20; i++) {
    let seat = document.createElement("div");
    seat.classList.add("seat");
    seat.innerText = i;

    // 🔴 If booked
    if (bookedSeats.includes(i)) {
        seat.classList.add("booked");
    } else {
        // 🟢 If available
        seat.onclick = function() {
            document.querySelectorAll(".seat").forEach(s => s.classList.remove("selected"));
            seat.classList.add("selected");
            document.getElementById("seatInput").value = i;
        };
    }

    seatsDiv.appendChild(seat);
}
</script>

</body>
</html>