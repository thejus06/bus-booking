<!DOCTYPE html>
<html>
<head>
    <title>Bus Booking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>NeoBus</h1>
    <p class="subtitle">Book your journey in the future</p>

    <form action="buses.php" method="GET" class="search-box">
        <input type="text" name="source" placeholder="From" required>
        <input type="text" name="destination" placeholder="To" required>
        <input type="date" name="date" required>

        <button type="submit">Search Buses</button>
    </form>
</div>

</body>
</html>