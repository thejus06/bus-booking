<?php
include 'db.php';
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$result = $conn->query("SELECT * FROM users WHERE id='$user_id'");
$user = $result->fetch_assoc();

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];

    $conn->query("UPDATE users SET name='$name', email='$email' WHERE id='$user_id'");

    header("Location: profile.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>👤 My Profile</h1>

    <form method="POST">
        <input type="text" name="name" value="<?php echo $user['name']; ?>"><br><br>
        <input type="email" name="email" value="<?php echo $user['email']; ?>"><br><br>

        <button name="update">Update</button>
    </form>

    <br>
    <a href="index.php"><button>Back</button></a>
</div>

</body>
</html>