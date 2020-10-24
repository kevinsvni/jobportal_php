<?php

include('../connection.php');
if (isset($_SESSION['isLogin'])) {
    header("location:../index.php");
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $insertquery = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email','$password')";
    if ($db->query($insertquery)) {
        header('location:login.php');
    } else if (mysqli_errno($db) == 1062) {
        echo "Either the mobile number or email has been already used.";
    } else {
        echo "Some Error";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../assets/css/loginsignup.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap" rel="stylesheet">

</head>

<body style="margin: 0; " class="signupbody">

    <?php
    require('../util.php');
    include(file_path('includes/header.php'));
    ?>

    <div class="mainsignup">
        <p class="sign" align="center">Sign Up</p>
        <form class="form1" method="post" onsubmit="return validation()">
            <input class="un" type="text" align="center" name="name" id="name" placeholder="Name">
            <input class="un" type="email" align="center" name="email" id="email" placeholder="E-mail">
            <input class="pass" type="password" align="center" name="password" id="password" placeholder="Password">
            <input class="pass" type="password" align="center" name="cpassword" id="cpassword" placeholder="Confirm Password">
            <input type="submit" name="submit" value="Sign Up" class="submit" style="margin-left: 34%;">
            <!-- <button class="submit" align="center">Sign Up</button> -->
            <!-- <a class="submit"  align="center">Sign Up</a> -->
            <p class="forgot" align="center">Already a user? <a href="login.php">Login Here</p>
        </form>
    </div>



    <script>
        function validation() {
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var pwd = document.getElementById("password").value;
            var cpwd = document.getElementById("cpassword").value;
            if (name == "") {
                alert("Please enter your name.");
                return false;
            } else if (email == "") {
                alert("Please enter your email.");
                return false;
            } else if (pwd == '') {
                alert("Please enter Password.");
                return false;
            } else if (cpwd == '') {
                alert("Please enter confirm password.");
                return false;
            } else if (pwd != cpwd) {
                alert("Password did not match: Please try again...");
                return false;
            } else {
                return true;
            }
        }
    </script>
    <?php include ('../includes/footer.php'); ?>

</body>

</html>