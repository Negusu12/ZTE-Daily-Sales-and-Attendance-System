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
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (user_id, user_name, password, promoter_name, promoter_phone, shop, role)
                  VALUES ('$user_id', '$user_name', '$hashed_password', '$promoter_name', '$promoter_phone', '$shop', '$role')";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<script>
        window.onload = function() {
            Swal.fire({
                icon: 'success',
                title: 'User Added Successfully',
                showConfirmButton: true,
                confirmButtonText: 'OK',
                timer: 2000
            }).then(function() {
                window.location.href = 'users.php';
            });
        }
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
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
                    <h1 class="opacity">Signup</h1>
                    <form method="post">
                        <input type="text" name="user_name" onkeyup="lettersOnly(this)" placeholder="USERNAME" />
                        <input type="password" name="password" placeholder="PASSWORD" />
                        <input type="text" name="promoter_name" onkeyup="lettersOnly(this)" placeholder="PROMOTER NAME" />
                        <input type="text" name="promoter_phone" placeholder="PROMOTER PHONE" />
                        <input type="text" name="shop" placeholder="SHOP" />
                        <select name="role" placeholder="ROLE">
                            <option value="">Select an Role</option>
                            <option value="2">Sales</option>
                            <option value="1">Admin</option>
                        </select>
                        <button class="opacity" type="submit" value="Signup">SUBMIT</button>
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