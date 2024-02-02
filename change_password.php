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
    <title>Change Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico" />
    <link rel="stylesheet" href="css/sweetalert2.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #03949B;
            margin: 0;
            padding: 0;
            color: #26225B;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            /* Adjusted margin for centering */
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #26225B;
            font-size: 28px;
            /* Increased font size */
            text-align: center;
            /* Centered text */
            margin-bottom: 20px;
            /* Added margin */
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #26225B;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #B2B435;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 10px;
            /* Added margin for spacing between form elements */
        }

        button {
            background-color: #03949B;
            color: #FFFFFF;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4D7DBF;
        }

        .alert {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .alert-danger {
            background-color: #FFD2D2;
            border: 1px solid #FF5E5E;
            color: #D8000C;
        }

        .alert-success {
            background-color: #DFF2BF;
            border: 1px solid #4F8A10;
            color: #4F8A10;
        }

        .btn-back {
            display: block;
            text-align: right;
            margin-bottom: 10px;
            text-decoration: none;
            color: #03949B;
            font-weight: bold;
        }

        .btn-back:hover {
            color: #4D7DBF;
        }
    </style>

</head>

<body>

    <body>

        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">

                    <div id="box" class="box container">
                        <a href="index.php" class="btn-back">Back to Home</a>
                        <h1>Change Password</h1>

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