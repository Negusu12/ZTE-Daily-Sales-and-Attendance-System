<?php
session_start();

include("connect.php");
include("functions.php");
include("backend/insert.php");

$user_data = check_login($con);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Get other form data
    $latitude = isset($_POST['latitude']) ? $_POST['latitude'] : null;
    $longitude = isset($_POST['longitude']) ? $_POST['longitude'] : null;
    $latitude_check_out = isset($_POST['latitude_check_out']) ? $_POST['latitude_check_out'] : null;
    $longitude_check_out = isset($_POST['longitude_check_out']) ? $_POST['longitude_check_out'] : null;
    $remark = isset($_POST['remark']) ? $_POST['remark'] : '';

    // Use prepared statement to avoid SQL injection
    $query = "INSERT INTO attendance_sheet (user_id, present, check_out, latitude, longitude, latitude_check_out, longitude_check_out, remark, attendance_time, check_out_time)
    VALUES (?, 'Yes', 'Yes', ?, ?, ?, ?, ?, NOW(), NOW())
    ";

    $stmt = mysqli_prepare($con, $query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "isssss", $user_data['id'], $latitude, $longitude, $latitude_check_out, $longitude_check_out, $remark);




    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    // Handle success or failure
    if ($result) {
        // Success
        echo "<script>alert('Attendance recorded successfully!');</script>";
    } else {
        // Failure
        echo "<script>alert('Failed to record attendance.');</script>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Sales</title>
    <link rel="icon" type="image/png" href="images/logo.png" />
    <link rel="stylesheet" href="css/style.css">
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
            max-width: 800px;
            margin: 0 auto;
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #03949B;
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        input[type="number"],
        input[type="text"],
        input[type="textarea"] {
            width: calc(100% - 20px);
            padding: 15px;
            box-sizing: border-box;
            margin-top: 10px;
            border: 1px solid #B2B435;
            border-radius: 6px;
            font-size: 16px;
            color: #26225B;
            background-color: #f4f4f4;
        }

        input[type="number"]:focus,
        input[type="text"]:focus,
        input[type="textarea"]:focus {
            outline: none;
            border-color: #03949B;
        }

        input[type="submit"] {
            background-color: #4D7DBF;
            color: #FFFFFF;
            padding: 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #26225B;
        }

        .div-logout,
        .div-signup {
            text-align: right;
            margin-bottom: 20px;
        }

        .class-logout,
        .class-signup {
            text-decoration: none;
            color: #414142;
            font-weight: bold;
            font-size: 16px;
        }

        .class-signup:hover {
            color: #03949B;
        }

        .username {
            font-size: 22px;
            margin-top: 10px;
            color: #4D7DBF;
        }

        .info {
            margin-top: 20px;
        }

        .ro {
            background-color: #d0d4da;
        }

        select {
            width: calc(100% - 20px);
            padding: 15px;
            box-sizing: border-box;
            margin-top: 10px;
            border: 1px solid #B2B435;
            border-radius: 6px;
            font-size: 16px;
            color: #26225B;
            background-color: #f4f4f4;
        }

        @media only screen and (max-width: 600px) {
            table {
                width: 100%;
                margin-top: 20px;
                border-collapse: collapse;
                overflow-x: auto;
            }

            th,
            td {
                white-space: nowrap;
            }

            input[type="number"],
            input[type="text"],
            input[type="textarea"],
            select {
                width: 100%;
                padding: 10px;
                box-sizing: border-box;
                margin-top: 10px;
                border: 1px solid #B2B435;
                border-radius: 6px;
                font-size: 14px;
                /* Adjusted font size for better fit */
                color: #26225B;
                background-color: #f4f4f4;
            }

            input[type="submit"] {
                padding: 12px;
                /* Adjusted padding for better touch experience */
                font-size: 16px;
            }

            .ro {
                width: 100%;
                /* Ensure the readonly input takes full width */
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="div-logout">
            <a href="logout.php" class="class-logout">Logout</a>
        </div>
        <?php if ($user_data['role'] == 1) : ?>
            <div class="div-signup">
                <a href="signup.php" class="class-signup">signup </a>
            </div>
        <?php endif; ?>

        <?php if ($user_data['role'] == 1) : ?>
            <select class="input100" id="text" name="role" onchange="redirectToPage()">
                <option value="">Reports</option>
                <option value="1">Report Daily Sales</option>
                <option value="2">Report Weekly Sales</option>
                <option value="3">Users</option>
                <option value="4">Attendance</option>
            </select>
        <?php endif; ?>
        <?php if ($user_data['role'] == 2) : ?>
            <select class="input100" id="text" name="role" onchange="redirectToPage()">
                <option value="">Select Option</option>
                <option value="5">Report Daily Sales</option>
            </select>
        <?php endif; ?>

        <div class="username"> Hello <?php echo $user_data['promoter_name']; ?>!</div>

        <form method="post" enctype="multipart/form-data" onsubmit="getLocationAndSubmit(event)">
            <div class="info">
                <h1>Promoter's Name:</h1><input type="text" readonly name="promoter_name" value="<?php echo $user_data['promoter_name']; ?>"> <br>
                <h1>Promoter's Phone Number:</h1><input type="text" readonly name="promoter_phone" value="<?php echo $user_data['promoter_phone']; ?>"><br>
                <h1>Name of the Shop</h1><input type="text" readonly name="shop" value="<?php echo $user_data['shop']; ?>"><br>
                <h1>Shop level (Circle One): Grand/Premium/Higher</h1><br>
            </div>
            <?php if ($user_data['role'] == 2) : ?>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo date('F j'); ?></td>
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">
                            <input type="hidden" name="latitude_check_out" id="latitude_check_out">
                            <input type="hidden" name="longitude_check_out" id="longitude_check_out">
                            <td><input type="submit" name="present" id="present" value="Check In" onclick="getLocationAndSubmit(event, false)"></td>


                            <td><input type="text" name="remark" id="remark"></td>
                        </tr>
                    </tbody>
                </table>
                <br>
            <?php endif; ?>
        </form>


        <form method="post" enctype="multipart/form-data" onsubmit="getLocationAndSubmit(event)">
            <td><input type="submit" name="check_out" id="check_out" value="Check Out" onclick="getLocationAndSubmit(event, true)"></td>
        </form>



        <script src="js/sweetalert2.min.js"></script>

        <!--select box redirection -->
        <script>
            function redirectToPage() {
                var selectBox = document.getElementById("text");
                var selectedValue = selectBox.value;

                if (selectedValue === "1") {
                    window.location.href = "report_daily_sales";
                } else if (selectedValue === "2") {
                    window.location.href = "report_weekly_sales";
                } else if (selectedValue === "3") {
                    window.location.href = "users";
                } else if (selectedValue === "4") {
                    window.location.href = "attendance_sheet";
                } else if (selectedValue === "5") {
                    window.location.href = "index";
                }
            }
        </script>

        <!-- geolocation -->
        <script>
            function getLocationAndSubmit(event, isCheckOut) {
                event.preventDefault();

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        if (isCheckOut) {
                            document.getElementById("latitude_check_out").value = position.coords.latitude;
                            document.getElementById("longitude_check_out").value = position.coords.longitude;
                        } else {
                            document.getElementById("latitude").value = position.coords.latitude;
                            document.getElementById("longitude").value = position.coords.longitude;
                        }

                        document.forms[0].submit();
                    }, function(error) {
                        alert("Error getting location: " + error.message);
                    });
                } else {
                    alert("Geolocation is not supported by this browser.");
                }
            }
        </script>
    </div>
</body>

</html>