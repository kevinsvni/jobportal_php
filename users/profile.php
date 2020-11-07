<?php
include('../connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<script type="text/javascript">
    function employee() {
        var a = window.open("employeeprofile.php", "_self");
    }

    function employer() {
        var a = window.open("employerprofile.php", "_self");
    }
</script>

<body class="indbody">
    <?php
    require('../util.php');
    include(file_path('includes/header.php'));
    ?>
    <div class="container" style="width: auto; height: auto;">
        <h4 style="text-align: center; padding-top: 10px; ">SELECT YOUR ROLE </h3><br />

            <div style="text-align: center; margin-bottom: 20px" class="boxed">

                <input type="radio" id="employee" name="type" value="Employee" onclick="employee()">
                <label for="employee">
                    <table style="margin-top: 6px; ">
                        <tr>
                            <td>
                                <i class='fas fa-user-tie' style='font-size:36px; padding: 10px 20px 10px 10px'></i>
                            </td>
                            <td style="text-align: left;">
                                <h4>I am an Employee.</h4>
                                <h6>I am in search of a job.</h6>
                            </td>
                        </tr>
                    </table>
                </label>

                <input type="radio" id="employer" name="type" value="Employer" onclick="employer()">
                <label for="employer">
                    <table style="margin-top: 6px;">
                        <tr>
                            <td>
                                <i class='fas fa-suitcase' style='font-size:36px; padding: 10px 20px 10px 10px'></i>
                            </td>
                            <td style="text-align: left;">
                                <h4>I am an Employer.</h4>
                                <h6>I am in search of an employee.</h6>
                            </td>
                        </tr>
                    </table>
                </label>
            </div>
    </div>
    <?php include ('../includes/footer.php'); ?>

</body>

</html>