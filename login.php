<?php 
include 'db.php';
session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    $user = $result->fetch_assoc();

    if($user && password_verify($password, $user['password'])){
        // ✅ Set session
        $_SESSION['user'] = $username;
        $_SESSION['user_id'] = $user['id'];

        // ✅ Redirect back to previous page (IMPORTANT FIX)
        if(isset($_SESSION['redirect_url'])){
            $redirect = $_SESSION['redirect_url'];
            unset($_SESSION['redirect_url']); // clear after use
            header("Location: $redirect");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Login</h1>

    <?php if(isset($error)) { ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>

        <button name="login">Login</button>
    </form>

    <p>New user? <a href="signup.php">Sign up</a></p>
</div>

</body>
</html>