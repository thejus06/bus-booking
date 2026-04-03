<?php
session_start();

$bus_id = $_POST['bus_id'];
$seats = $_POST['seat'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container" id="paymentBox">
    <h1>💳 Payment</h1>

    <p><strong>Seats:</strong> <?php echo $seats; ?></p>

    <form id="payForm" action="confirm.php" method="POST">
        <input type="hidden" name="bus_id" value="<?php echo $bus_id; ?>">
        <input type="hidden" name="seat" value="<?php echo $seats; ?>">

        <button type="submit" onclick="processPayment()">Pay Now</button>
    </form>
</div>
<script src="script.js"></script>
</body>
</html>