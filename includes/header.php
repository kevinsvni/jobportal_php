<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header</title>
  <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>

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
      } else { ?>
        <a href="<?php echo base_url('authenticate/logout.php') ?>" style="float: right;"><span class="glyphicon glyphicon-log-out" style="font-size: 15px;"></span>&nbsp;Logout</a>
        <a href="<?php
                  if (isset($_SESSION['isLogin'])) {
                    $id = $_SESSION['id'];
                  }
                  $qcheck = $db->query("SELECT * FROM employee_profile WHERE `id`=$id");
                  if ($qcheck->num_rows == 0) {
                    echo base_url('users/profile.php');
                  } else {
                    echo base_url('users/employeeprofile.php');
                  }

                  ?>" style="float: right;"><i class='fas fa-user-alt' style="font-size: 14.5px;"></i>&nbsp;Profile</a>


      <?php
      }
      ?>

    </div>
  </div>


</body>

</html>