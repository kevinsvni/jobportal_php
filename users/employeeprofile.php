<?php
include('../connection.php');

if (isset($_SESSION['isLogin'])) {
    $id = $_SESSION['id'];

    $qcheck = $db->query("SELECT * FROM employee_profile WHERE `id`=$id");
    if ($qcheck->num_rows == 0) {
        @$db->query("INSERT INTO employee_profile (`id`) VALUES ('$id');");
        $queryex = "SELECT * FROM users WHERE id = $id";
        $usrrow = $db->query($queryex);
        $user = $usrrow->fetch_object();
    } else {
        $queryex = "SELECT * FROM employee_profile WHERE id = $id";
        $usrrow = $db->query($queryex);
        $user = $usrrow->fetch_object();
    }
}
if (isset($_POST['savedetails'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $education = $_POST['education'];
    $experience = $_POST['experience'];
    $description = $_POST['description'];

    $photoname = $_FILES['user_image']['name'];
    if (!$photoname) {
        $photoname = $user->image;
    } else {
        $tempphotoname = $_FILES['user_image']['tmp_name'];
        $destination1 = '../assets/uploaded files/' . $photoname;
        move_uploaded_file($tempphotoname, $destination1);
    }
    
       
        
    $resumename = $_FILES['user_resume']['name'];
    if (!$resumename) {
        $resumename = $user->resume;
    } else {
        $tempresname = $_FILES['user_resume']['tmp_name'];
        $destination2 = '../assets/uploaded files/' . $resumename;
        move_uploaded_file($tempresname, $destination2);
    }



    $insertquery = "UPDATE employee_profile SET 
    `name`='$name',
    `email`='$email',
    `contact`='$contact',
    `address`='$address',
    `city`='$city',
    `state`='$state',
    `education`='$education',
    `experience`='$experience',

    `image`='$photoname',
    `resume`='$resumename',
    
    `description`='$description'
    WHERE id = $id
    ";

    if ($db->query($insertquery)) {
        echo "Updated Successfully!!!";
        header('location:employeeprofile.php');
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
    <title>Employee Profile</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/profileform.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body class="indbody">
    <?php
    require('../util.php');
    include(file_path('includes/header.php'));
    ?>


    <div id="page-container">
        <div class="container1" style="width: auto; height: auto; padding: 10px;">
            <h3 style="padding: 10px 0px 10px 15px;">Employee Profile</h3>
            <form class="form1" method="post" onsubmit="" enctype="multipart/form-data">

                <table class="eptab">
                    <tr>
                        <td>
                            <label for="fname">Name:</label>
                        </td>
                        <td>
                            <input class="txt" type="text" align="center" name="name" id="name" placeholder="Name" value="<?php echo $user->name; ?>">
                            <!-- <input class="txt" type="text" align="center" name="lname" id="lname" placeholder="Surname"> -->
                        </td>
                        <td rowspan="5" align="center" style="padding: 0px;">
                            <label for="user_image">Profile Image:</label><br />
                            <div style="width: 100px; height: 100px;">

                                <?php
                                error_reporting(0);     
                                if ($user->image) { ?>
                                    <img src="../assets/uploaded files/<?php echo $user->image ?>" width="100px" height="100px" style="border-radius: 50%; padding: 5px">
                                <?php } else { ?>
                                    <img src="../assets/img/defaultprofile.png" width="100%" height="">
                                <?php } ?>



                            </div>
                            <input type="file" name="user_image" id="user_image" style="width: 94px;">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email:</label>
                        </td>
                        <td>
                            <input class="txt" type="email" align="center" name="email" id="email" placeholder="E-mail" value="<?php echo $user->email; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="contact">Contact:</label>
                        </td>
                        <td>
                            <input class="txt" type="text" align="center" name="contact" id="contact" placeholder="+91" value="<?php echo isset($user->contact) ? $user->contact : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="address">Address:</label>
                        </td>
                        <td>
                            <textarea class="txt" id="address" name="address"><?php echo isset($user->address) ? $user->address : ''; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="city">City:</label>
                        </td>
                        <td>
                            <input type="text" class="txt" id="city" name="city" value="<?php echo isset($user->city) ? $user->city : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="state">State:</label>
                        </td>
                        <td>
                            <input type="text" class="txt" id="state" name="state" value="<?php echo isset($user->state) ? $user->state : ''; ?>">
                        </td>
                        <td rowspan="4" align="center" style="padding-left: 80px; padding-right: 80px">
                            <label for="resume">CV Resume:</label><br />

                            <?php
                            error_reporting(0);
                            if ($user->resume) { ?>
                                <iframe src="../assets/uploaded files/<?php echo $user->resume ?>" width="100px" height="100px" frameborder="0" scrolling="no"></iframe>
                            <?php } else { ?>
                                <img src="../assets/img/resumedefault.png" width="50%" height="">
                            <?php } ?>



                            <input type="file" name="user_resume" id="user_resume" style="width: 104px; padding: 10px">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="education">Education:</label>
                        </td>
                        <td>
                            <input class="txt" type="text" align="center" name="education" id="education" placeholder="" value="<?php echo isset($user->education) ? $user->education : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="experience">Experience:</label>
                        </td>
                        <td>
                            <input class="txt" type="text" align="center" name="experience" id="experience" placeholder="" value="<?php echo isset($user->experience) ? $user->experience : ''; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="description">Description:</label>
                        </td>
                        <td>
                            <textarea class="txt" id="description" name="description"><?php echo isset($user->description) ? $user->description : ''; ?></textarea>
                        </td>
                    </tr>
                </table>
                <input type="submit" name="savedetails" value="Save Details" class="submit" style="margin-left: 40%; margin-top: 10px; margin-bottom: 10px;">

            </form>
        </div>
        <div style="position: absolute; width: 100%; margin-top: 650px;">
            <?php include('../includes/footer.php'); ?>
        </div>
    </div>

</body>

</html>