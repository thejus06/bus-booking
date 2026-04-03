<?php
session_start();
if(!isset($_SESSION['user'])){
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

    <form action="confirm.php" method="POST">
        <input type="hidden" name="bus_id" value="<?php echo $bus_id; ?>">
        <input type="hidden" name="seat" id="seatInput">

        <!-- 💺 SEAT GRID -->
        <div class="seat-grid" id="seats"></div>

        <p id="selectedText">Selected Seats: None</p>

        <br>
        <button type="submit">Confirm Booking</button>
    </form>
</div>

<script>
let bookedSeats = <?php echo json_encode($booked); ?>;
let selectedSeats = [];

let seatsDiv = document.getElementById("seats");

for (let i = 1; i <= 20; i++) {
    let seat = document.createElement("div");
    seat.classList.add("seat");
    seat.innerText = i;

    // 🔴 already booked
    if (bookedSeats.includes(i)) {
        seat.classList.add("booked");
    } else {
        seat.onclick = function() {
            if (selectedSeats.includes(i)) {
                selectedSeats = selectedSeats.filter(s => s !== i);
                seat.classList.remove("selected");
            } else {
                selectedSeats.push(i);
                seat.classList.add("selected");
            }

            document.getElementById("seatInput").value = selectedSeats.join(",");

            document.getElementById("selectedText").innerText =
                selectedSeats.length > 0
                ? "Selected Seats: " + selectedSeats.join(", ")
                : "Selected Seats: None";
        };
    }

    seatsDiv.appendChild(seat);
}
</script>

</body>
</html>