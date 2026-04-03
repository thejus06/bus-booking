<?php
include 'db.php';
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$result = $conn->query("SELECT * FROM bookings WHERE user_id='$user_id'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Bookings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>🎟 My Bookings</h1>

    <?php while($row = $result->fetch_assoc()) { ?>
        <div class="ticket">
            <p><strong>Bus ID:</strong> <?php echo $row['bus_id']; ?></p>
            <p><strong>Seats:</strong> <?php echo $row['seat_number']; ?></p>
            <p><strong>User:</strong> <?php echo $row['user_name']; ?></p>
        </div>
        <br>
    <?php } ?>

    <a href="index.php">
        <button>Back</button>
    </a>
</div>

</body>
</html>