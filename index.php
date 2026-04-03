<!DOCTYPE html>
<html>
<head>
    <title>Bus Booking</title>
    <link rel="stylesheet" href="style.css">
</head>
<script src="https://cdn.jsdelivr.net/npm/particles.js"></script>
<script>
particlesJS("particles-js", {
  particles: {
    number: { value: 60 },
    size: { value: 3 },
    move: { speed: 2 },
    line_linked: { enable: true },
  }
});
</script>
<div id="particles-js"></div>
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