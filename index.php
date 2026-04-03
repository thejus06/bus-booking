<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>NeoBus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <!-- 🚀 TITLE -->
    <h1>NeoBus</h1>
    <p class="subtitle">Book your journey in the future</p>

    <!-- 🔐 USER SECTION -->
    <?php if(isset($_SESSION['user'])) { ?>
        
        <p>Welcome, <?php echo $_SESSION['user']; ?> 👋</p>

        <div style="margin-bottom:15px;">
            <a href="profile.php"><button>My Profile</button></a>
            <a href="history.php"><button>My Bookings</button></a>
            <a href="logout.php"><button>Logout</button></a>
        </div>

    <?php } else { ?>

        <div style="margin-bottom:15px;">
            <a href="login.php"><button>Login</button></a>
            <a href="signup.php"><button>Sign Up</button></a>
        </div>

    <?php } ?>

    <!-- 🔍 SEARCH FORM -->
    <form action="buses.php" method="GET" class="search-box">
        <input type="text" name="source" placeholder="From" required>
        <input type="text" name="destination" placeholder="To" required>
        <input type="date" name="date" required>

        <button type="submit">Search Buses</button>
    </form>

</div>

</body>
</html>