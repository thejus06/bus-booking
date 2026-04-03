<?php $bus_id = $_GET['bus_id']; ?>

<h2>Select Seat</h2>

<form action="confirm.php" method="POST">
    <input type="hidden" name="bus_id" value="<?php echo $bus_id; ?>">

    <div id="seats"></div>

    Name: <input type="text" name="name"><br>

    <input type="hidden" name="seat" id="seatInput">

    <button type="submit">Confirm Booking</button>
</form>

<script>
let seatsDiv = document.getElementById("seats");

for (let i = 1; i <= 20; i++) {
    let btn = document.createElement("button");
    btn.innerText = i;

    btn.onclick = function(e) {
        e.preventDefault();
        document.getElementById("seatInput").value = i;
        alert("Seat " + i + " selected");
    };

    seatsDiv.appendChild(btn);
}
</script>