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
    $status = $_POST['status'];

    if (!empty($user_name) && !empty($password) && !is_numeric(($user_name))) {
        $user_id = random_num(20);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (user_id, user_name, password, promoter_name, promoter_phone, shop, role, status)
                  VALUES ('$user_id', '$user_name', '$hashed_password', '$promoter_name', '$promoter_phone', '$shop', '$role', '$status')";
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
    <title>Signup</title>
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
    <!-- partial:index.partial.html -->

    <body>

        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">

                    <div id="box" class="box container">
                        <a href="users.php" class="btn-back">Go to User</a>
                        <h1>Add User</h1>
                        <form method="post">
                            <div class="form-group">
                                <label for="user_name">User Name:</label>
                                <input type="text" name="user_name" onkeyup="lettersOnly(this)" placeholder="USERNAME" required />
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" placeholder="PASSWORD" required />
                            </div>
                            <div class="form-group">
                                <label for="promoter_name">Promoter Name:</label>
                                <input type="text" name="promoter_name" placeholder="PROMOTER NAME" required />
                            </div>
                            <div class="form-group">
                                <label for="promoter_phone">Promoter Phone:</label>
                                <input type="text" name="promoter_phone" placeholder="PROMOTER PHONE" required />
                            </div>
                            <div class="form-group">
                                <label for="shop">Shop:</label>
                                <input type="text" name="shop" placeholder="SHOP" required />
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select name="role" placeholder="ROLE" required>
                                    <option value="">Select an Role</option>
                                    <option value="2">Sales</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                            <input type="text" name="status" value="Active" style="display: none;" />
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