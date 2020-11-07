<?php
include('../connection.php');
if (isset($_SESSION['isLogin'])) {
    header("location:../index.php");
}

if (isset($_POST['submit'])) {

    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $loginquery = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'";
    $row = $db->query($loginquery);
    // $emailexist = $user->email;
    // $passwordexist = $user->password;
    if ($row->num_rows == 1) {
        $username = $row->fetch_object();
        $_SESSION['isLogin'] = true;
        $_SESSION['user'] = $username->name;
        $_SESSION['id'] = $username->id;
        header('location:../index.php');
    }else {
        echo "Login Failed";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/loginsignup.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap" rel="stylesheet">
</head>

<body style="margin: 0; height: 100%; overflow: hidden" class="loginbody">

    <?php
    require('../util.php');
    include(file_path('includes/header.php'));
    ?>

    <div class="mainlogin">
        <p class="sign" align="center">Login</p>
        <form class="form1" method="post" autocomplete="off">
            <input class="un" type="email" id="email" name="email" align="center" placeholder="E-mail">
            <input class="pass" type="password" name="password" align="center" placeholder="Password">
            <input type="submit" name="submit" value="Login" class="submit" id="submit" align="center" style="margin-left: 36%;">
            <p class="forgot" align="center"><a href="forgot.php">Forgot Password?</a></p>

        </form>
    </div>

    <?php include('../includes/footer.php'); ?>

</body>

</html>