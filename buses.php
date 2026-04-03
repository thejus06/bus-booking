<?php include 'db.php'; ?>

<?php
$source = $_GET['source'];
$destination = $_GET['destination'];
$date = $_GET['date'];

$sql = "SELECT * FROM buses 
        WHERE source='$source' 
        AND destination='$destination' 
        AND date='$date'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Available Buses</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Available Buses</h1>

    <div class="bus-list">
        <?php while($row = $result->fetch_assoc()) { ?>
            <div class="bus-card">
                <h2><?php echo $row['name']; ?></h2>
                <p>🕒 <?php echo $row['time']; ?></p>
                <p>💰 ₹<?php echo $row['price']; ?></p>

                <a href="book.php?bus_id=<?php echo $row['id']; ?>">
                    <button>Book Now</button>
                </a>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>