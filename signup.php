<?php
session_start();

if(isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}

include 'db.php';

if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // ✅ check username
    $checkUser = $conn->query("SELECT * FROM users WHERE username='$username'");
    if($checkUser->num_rows > 0){
        $error = "Username already taken!";
    }
    else {
        // ✅ check email
        $checkEmail = $conn->query("SELECT * FROM users WHERE email='$email'");
        if($checkEmail->num_rows > 0){
            $error = "Email already registered!";
        }
        else {
            // ✅ insert
            $sql = "INSERT INTO users (name, username, email, password) 
                    VALUES ('$name', '$username', '$email', '$password')";

            if($conn->query($sql)){
                header("Location: login.php");
                exit();
            } else {
                $error = "Something went wrong!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Sign Up</h1>

    <?php if(isset($error)) { ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST">
        <input type="text" name="name" placeholder="Full Name" required><br><br>
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>

        <button name="signup">Create Account</button>
    </form>

    <p>Already have account? <a href="login.php">Login</a></p>
</div>

</body>
</html>