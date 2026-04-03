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

<h2>Available Buses</h2>

<?php while($row = $result->fetch_assoc()) { ?>
    <div>
        <h3><?php echo $row['name']; ?></h3>
        Time: <?php echo $row['time']; ?><br>
        Price: ₹<?php echo $row['price']; ?><br>

        <a href="book.php?bus_id=<?php echo $row['id']; ?>">
            Book Now
        </a>
    </div>
<?php } ?>