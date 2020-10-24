<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header</title>
  <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap" rel="stylesheet">

</head>

<body>

  <?php
  include_once(file_path('util.php'));
  //  echo "<pre>"; print_r($_SERVER);
  ?>

  <div class="header">
    <a class="logo" style="color: #393b44;   font-size: 32px;">Job Portal</a>
    <div class="header-right">
      <a class="active" href="<?php echo base_url('index.php') ?>">Home</a>
      <a href="#contact">Contact</a>
      <a href="#about">About</a>
      <?php
      if (!isset($_SESSION['isLogin'])) { ?>

        <a href="<?php echo base_url('authenticate/login.php') ?>" style="float: right;">Login</a>
        <a href="<?php echo base_url('authenticate/signup.php') ?>" style="float: right;">Sign Up</a>

      <?php
      }else{?>

      <a href="<?php echo base_url('authenticate/logout.php') ?>" style="float: right;">Logout</a>

      <?php
      }
      ?>

    </div>
  </div>


</body>

</html>