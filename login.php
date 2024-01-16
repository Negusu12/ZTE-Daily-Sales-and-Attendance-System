<?php
session_start();

include("connect.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric(($user_name))) {
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);
        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if (password_verify($password, $user_data['password'])) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        echo "<script>
        window.onload = function() {
            // Display a success message using SweetAlert
            Swal.fire({
                icon: 'error',
                title: 'Username or Password is incorrect please enter valid information!',
                showConfirmButton: false,
                showDenyButton: true,
                denyButtonText: 'OK'
            });
        }
     </script>";
    } else {
        echo "<script>
        window.onload = function() {
            // Display a success message using SweetAlert
            Swal.fire({
                icon: 'error',
                title: 'Please enter valid information!',
                showConfirmButton: false,
                showDenyButton: true,
                denyButtonText: 'OK'
            });
        }
     </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">

</head>

<body>
    <!-- partial:index.partial.html -->

    <body>
        <section class="container">
            <div class="login-container">
                <div class="circle circle-one"></div>
                <div class="form-container">
                    <img src="images/logo.png" alt="illustration" class="illustration">
                    <img src="images/zte.png" alt="illustration" class="illustrationn">
                    <h1 class="opacity">LOGIN</h1>
                    <form method="post">
                        <input type="text" name="user_name" onkeyup="lettersOnly(this)" placeholder="USERNAME" />
                        <input type="password" name="password" placeholder="PASSWORD" />
                        <button class="opacity" type="submit">SUBMIT</button>
                    </form>
                </div>
                <div class="circle circle-two"></div>
            </div>
            <div class="theme-btn-container"></div>
        </section>
    </body>
    <!-- partial -->
    <script src="js/login.js"></script>
    <script src="js/sweetalert2.min.js"></script>

</body>

</html>