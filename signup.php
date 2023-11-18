<?php
session_start();

include 'backend/insert.php';
include("connect.php");
include("functions.php");
$user_data = check_login($con);
if ($user_data['role'] == 2) {
    // Redirect or display an error message
    header("Location: login"); // Redirect to login page
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $promoter_name = $_POST['promoter_name'];
    $promoter_phone = $_POST['promoter_phone'];
    $shop = $_POST['shop'];
    $role = $_POST['role'];

    if (!empty($user_name) && !empty($password) && !is_numeric(($user_name))) {
        $user_id = random_num(20);
        $query = "INSERT INTO users (user_id, user_name, password, promoter_name, promoter_phone, shop, role)
                  VALUES ('$user_id', '$user_name', '$password', '$promoter_name', '$promoter_phone', '$shop', '$role')";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<script>
            alert('User added Successfully');
            window.location.href = 'users.php';
          </script>";
        } else {
            echo "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to Add User',
                        showConfirmButton: false,
                        showDenyButton: true,
                        denyButtonText: 'OK'
                    });
                  </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="css/login/css/main.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <!--===============================================================================================-->
</head>

<body>
    <!--Image loader start-->
    <div class="loader">
        <img src="images/logo.png" alt="Logoo" class="logoo">
    </div>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/logo.png" alt="IMG">
                </div>

                <div id="box" class="box">
                    <form method="post">
                        <span class="login100-form-title">
                            Signup
                        </span>

                        <div class="wrap-input100 validate-input" data-validate="Valid Username is required: ex@abc.xyz">
                            <input class="input100" id="text" type="text" name="user_name" onkeyup="lettersOnly(this)" placeholder="Username">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100" id="text" type="password" name="password" placeholder="Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>


                        <div class="wrap-input100 validate-input" data-validate="Valid promoter_name is required: ex@abc.xyz">
                            <input class="input100" id="text" type="text" name="promoter_name" onkeyup="lettersOnly(this)" placeholder="promoter_name">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="promoter_phone is required">
                            <input class="input100" id="text" type="text" name="promoter_phone" placeholder="promoter_phone">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="shop is required">
                            <input class="input100" id="text" type="text" name="shop" placeholder="shop">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Role is required">
                            <select class="input100" id="text" name="role">
                                <option value="">Select an Role</option>
                                <option value="2">Sales</option>
                                <option value="1">Admin</option>
                            </select>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">

                            <input class="login100-form-btn" type="submit" value="Signup">

                        </div>


                        <div class="text-center p-t-136">

                        </div>

                    </form>
                </div>
            </div>
        </div>
        <script src="assets/js/js.js"></script>
        <script src="js/sweetalert2.min.js"></script>
        <!-- Image page loader-->
        <script>
            window.addEventListener("load", () => {
                const loader = document.querySelector(".loader");

                loader.classList.add("loader--hidden");

                loader.addEventListener("transitionend", () => {
                    document.body.removeChild(loader);
                });
            });
        </script>
</body>

</html>