<?php
session_start();

if(isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}

include 'db.php';

if(isset($_POST['signup'])){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // ✅ Check if username exists
    $check = $conn->query("SELECT * FROM users WHERE username='$username'");

    if($check->num_rows > 0){
        $error = "Username already taken!";
    } else {
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if($conn->query($sql)){
            header("Location: login.php");
            exit();
        }
    }
}
?>

<?php
if(isset($_POST['signup'])){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $conn->query($sql);

    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
    <?php if(isset($error)) { ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php } ?>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Sign Up</h1>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button name="signup">Create Account</button>
    </form>

    <p>Already have account? <a href="login.php">Login</a></p>
</div>

</body>
</html>