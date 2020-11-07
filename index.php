<?php
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap" rel="stylesheet">

</head>

<body class="indbody">
    <?php

    require('util.php');
    include(file_path('includes/header.php'));
    // $file = $_SERVER['DOCUMENT_ROOT'] . "/jobportal/" . 'includes/header.php';
    // include($file);
    // echo file_path('includes/header.php');
    ?>
<div class="page-container">
   <div class="content-wrap">
       <?php
       if(isset($_SESSION['isLogin'])){
        ?>

       Hello <?php print_r ($_SESSION['user']);?>, Welcome to Job Portal. <br>

       <?php
       }else{
        ?>

       Welcome to Job Portal.

       <?php } ?>

      
    
   </div>
   <?php include ('includes/footer.php'); ?>
 </div>

</body>
</html>