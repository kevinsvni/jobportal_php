
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot</title>
    <link rel="stylesheet" href="../assets/css/loginsignup.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap" rel="stylesheet">
</head>

<body style="margin: 0; height: 100%; overflow: hidden" class="loginbody">

    <?php
    require('../util.php');
    include(file_path('includes/header.php'));
    ?>

    <div class="mainforgot">
        <p class="sign" align="center">Reset Password</p>
        <form class="form1" method="post" autocomplete="off">
            <input class="un" type="email" id="email" name="email" align="center" placeholder="E-mail">
            <input type="submit" name="submit" value="Send Password" class="submit" id="submit" align="center" style="margin-left: 26%;">
            <p class="forgot" align="center"><a href="signup.php">Sign Up</a> | <a href="login.php">Login</a></p>

        </form>
    </div>

    <?php include('../includes/footer.php'); ?>

</body>

</html>