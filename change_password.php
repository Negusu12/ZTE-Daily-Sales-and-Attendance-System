<?php
session_start();
include 'backend/insert.php';
include("connect.php");
include("functions.php");

$user_data = check_login($con);

if (isset($_POST['submitp'])) {
    $id = addslashes($_POST['id']);
    $current_passwordd = addslashes($_POST['current_passwordd']);
    $new_password = addslashes($_POST['new_password']);
    $confirm_password = addslashes($_POST['confirm_password']);

    // Retrieve the hashed password from the database
    $sql = "SELECT password FROM users WHERE id='$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        // Check if the new password and confirm password fields match
        if ($new_password !== $confirm_password) {
            // Display an error message
            echo "<script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'New Passwords and Confirm Password do not match.',
                        showConfirmButton: false,
                        showDenyButton: true,
                        denyButtonText: 'OK'
                    });
                }
            </script>";
        } else if (!password_verify($current_passwordd, $hashed_password)) {
            // Check if the entered current password is incorrect
            echo "<script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Current password is incorrect.',
                        showConfirmButton: false,
                        showDenyButton: true,
                        denyButtonText: 'OK'
                    });
                }
            </script>";
        } else {
            // Update the password in the database
            $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_sql = "UPDATE users SET password='$hashed_new_password' WHERE id='$id'";
            $update_result = mysqli_query($con, $update_sql);

            if ($update_result) {
                // Display a success message
                echo "<script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Password Updated Successfully',
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        timer: 2000
                    }).then(function() {
                        window.location.href = 'index.php';
                    });
                }
            </script>";
            } else {
                // Display an error message
                echo "<script>
                    window.onload = function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Password not changed.',
                            showConfirmButton: false,
                            showDenyButton: true,
                            denyButtonText: 'OK'
                        });
                    }
                </script>";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">

</head>

<body>

    <body>
        <section class="container">
            <div class="login-container">
                <div class="circle circle-one"></div>
                <div class="form-container">
                    <img src="images/logo.png" alt="illustration" class="illustration">
                    <img src="images/zte.png" alt="illustration" class="illustrationn">
                    <a href="index">
                        <h1 class="opacity" align="left">Change Password</h1>
                    </a>

                    <form method="post">
                        <label for="">User Name</label>
                        <input readonly style="text-transform: capitalize;" value="<?php echo $user_data['user_name']; ?>" />
                        <input type="text" style="display: none;" readonly name="id" value="<?php echo $user_data['id']; ?>">
                        <label for="">Current Password</label>
                        <input type="password" name="current_passwordd" oninvalid="this.setCustomValidity('Enter current_password Here')" oninput="setCustomValidity('')" required>
                        <label for="">New Password</label>
                        <input type="password" name="new_password" oninvalid="this.setCustomValidity('Enter new_password Here')" oninput="setCustomValidity('')" required>
                        <label for="">Confirm Password</label>
                        <input type="password" name="confirm_password">
                        <button type="submit" name="submitp">SUBMIT</button>
                    </form>
                </div>
                <div class="circle circle-two"></div>
            </div>
            <div class="theme-btn-container"></div>
        </section>
    </body>
    <script src="js/login.js"></script>
    <script src="js/sweetalert2.min.js"></script>

</body>

</html>