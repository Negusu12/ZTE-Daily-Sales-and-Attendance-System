<?php
date_default_timezone_set('UTC');

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include("connect.php");
include("functions.php");
include("backend/insert.php");

$user_data = check_login($con);

// Check if the user has already checked in or checked out today
$checkInDisabled = hasCheckInToday($con, $user_data['id']);
$checkOutDisabled = hasCheckOutToday($con, $user_data['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ... (rest of your existing code)
}

// Function to check if the user has already checked in today
function hasCheckInToday($con, $userID)
{
    $today = date('Y-m-d');
    $sql = $con->prepare("SELECT id FROM check_in WHERE user_id = ? AND DATE(attendance_time) = ?");
    $sql->bind_param("is", $userID, $today);
    $sql->execute();
    $sql->store_result();
    $rowCount = $sql->num_rows;
    $sql->close();

    return $rowCount > 0;
}

// Function to check if the user has already checked out today
function hasCheckOutToday($con, $userID)
{
    $today = date('Y-m-d');
    $sql = $con->prepare("SELECT id FROM check_out WHERE user_id = ? AND DATE(check_out_time) = ?");
    $sql->bind_param("is", $userID, $today);
    $sql->execute();
    $sql->store_result();
    $rowCount = $sql->num_rows;
    $sql->close();

    return $rowCount > 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['check_in']) && !$checkInDisabled) {
        $userID = $user_data['id'];
        $checkIn = $_POST['check_in'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $remark = $_POST['remark'];
        $date = $_POST['date'];

        $attendance_time = date('Y-m-d H:i:s', strtotime('+3 hours'));
        $sql = $con->prepare("INSERT INTO check_in (user_id, check_in, latitude, longitude, remark, attendance_time, date) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param("issssss", $userID, $checkIn, $latitude, $longitude, $remark, $attendance_time, $date);



        if ($sql->execute()) {
            echo "<script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Checked In Successfully',
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        timer: 2000
                    }).then(function() {
                        window.location.href = 'attendance.php';
                    });
                }
            </script>";
        } else {
            echo "<script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to Check In',
                        showConfirmButton: false,
                        showDenyButton: true,
                        denyButtonText: 'OK'
                    });
                }
            </script>";
        }
    }

    if (isset($_POST['check_out']) && !$checkOutDisabled) {
        $userID = $user_data['id'];
        $checkOut = $_POST['check_out'];
        $latitudeCheckOut = $_POST['latitude_check_out'];
        $longitudeCheckOut = $_POST['longitude_check_out'];
        $remark = $_POST['remark'];
        $date = $_POST['date'];

        $check_out_time = date('Y-m-d H:i:s', strtotime('+3 hours'));
        $sql = $con->prepare("INSERT INTO check_out (user_id, check_out, latitude_check_out, longitude_check_out, remark, check_out_time, date) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param("issssss", $userID, $checkOut, $latitudeCheckOut, $longitudeCheckOut, $remark, $check_out_time, $date);

        if ($sql->execute()) {
            echo "<script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Checked Out Successfully',
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        timer: 2000
                    }).then(function() {
                        window.location.href = 'attendance.php';
                    });
                }
            </script>";
        } else {
            echo "<script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to Check Out',
                        showConfirmButton: false,
                        showDenyButton: true,
                        denyButtonText: 'OK'
                    });
                }
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

        .hidden-form {
            display: none;
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
                <option value="7">Change Password</option>
            </select>
        <?php endif; ?>

        <div class="username"> Hello <?php echo $user_data['promoter_name']; ?>!</div>

        <form method="post" enctype="multipart/form-data" onsubmit="getLocationAndSubmit(event, false)">
            <div class="info">
                <h1>Promoter's Name:</h1><input type="text" readonly name="promoter_name" value="<?php echo $user_data['promoter_name']; ?>"> <br>
                <h1>Promoter's Phone Number:</h1><input type="text" readonly name="promoter_phone" value="<?php echo $user_data['promoter_phone']; ?>"><br>
                <h1>Name of the Shop</h1><input type="text" readonly name="shop" value="<?php echo $user_data['shop']; ?>"><br>
                <input type="text" readonly name="date" id="dateField" style="display: none;">
                <h1>Shop level (Circle One): Grand/Premium/Higher</h1><br>
            </div>
            <?php if ($user_data['role'] == 2) : ?>
                <table>
                    <thead>
                        <tr>
                            <th class="coon">Date</th>
                            <th class="coon">Check In</th>
                            <th class="coon">Check Out</th>
                            <th>Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="coon"><?php echo date('F j'); ?></td>
                            <input class="coon" type="text" name="user_id" id="user_id" value="<?php echo $user_data['id']; ?>">
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">
                            <input class="coon" type="text" name="check_in" value="Yes">

                            <input type="submit" name="check_in" id="check_in" value="Check In">


                            <?php if (!$checkInDisabled) : ?>
                                <h1>Remark:</h1><input type="text" name="remark" id="remark">
                            <?php endif; ?>
                        </tr>
                    </tbody>
                </table>
                <br>
            <?php endif; ?>
        </form>





        <form class="hidden-form" method="post" enctype="multipart/form-data" onsubmit="getLocationAndSubmit(event, true)">
            <div class="info coon">
                <h1>Promoter's Name:</h1><input type="text" readonly name="promoter_name" value="<?php echo $user_data['promoter_name']; ?>"> <br>
                <h1>Promoter's Phone Number:</h1><input type="text" readonly name="promoter_phone" value="<?php echo $user_data['promoter_phone']; ?>"><br>
                <h1>Name of the Shop</h1><input type="text" readonly name="shop" value="<?php echo $user_data['shop']; ?>"><br>
                <input type="text" readonly name="date" id="dateFieldd" style="display: none;">
                <h1>Shop level (Circle One): Grand/Premium/Higher</h1><br>
            </div>
            <?php if ($user_data['role'] == 2) : ?>
                <table>
                    <thead>
                        <tr>
                            <th class="coon">Date</th>
                            <th class="coon">Check In</th>
                            <th class="coon">Check Out</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="coon"><?php echo date('F j'); ?></td>
                            <input class="coon" type="text" name="user_id" id="user_id" value="<?php echo $user_data['id']; ?>">
                            <input type="hidden" name="latitude_check_out" id="latitude_check_out">
                            <input type="hidden" name="longitude_check_out" id="longitude_check_out">
                            <input class="coon" type="text" name="check_out" value="Yes">

                            <input type="submit" name="check_out" id="check_out" value="Check Out">


                            <?php if (!$checkOutDisabled) : ?>
                                <h1>Remark:</h1><input type="text" name="remark" id="remark">
                            <?php endif; ?>
                        </tr>
                    </tbody>
                </table>
                <br>
            <?php endif; ?>
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
                } else if (selectedValue === "7") {
                    window.location.href = "change_password";
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

                        // Submit the form with the correct index
                        document.forms[isCheckOut ? 1 : 0].submit();
                    }, function(error) {
                        alert("Error getting location: " + error.message);
                    });
                } else {
                    alert("Geolocation is not supported by this browser.");
                }
            }
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const checkInButton = document.getElementById("check_in");
                const checkOutButton = document.getElementById("check_out");
                const secondForm = document.querySelector(".hidden-form");

                <?php if ($checkInDisabled) : ?>
                    checkInButton.disabled = true;
                    checkInButton.value = "Already Checked In";
                    checkInButton.style.backgroundColor = "#4CAF50"; // Green color
                    checkInButton.style.color = "#FFFFFF"; // White text color
                    secondForm.style.display = "block"; // Show the second form
                <?php else : ?>
                    const attendanceTimeInput = document.getElementById("attendance_time");
                    attendanceTimeInput.value = getCurrentDateTime();
                <?php endif; ?>

                <?php if ($checkOutDisabled) : ?>
                    checkOutButton.disabled = true;
                    checkOutButton.value = "Already Checked Out";
                    checkOutButton.style.backgroundColor = "#4CAF50"; // Green color
                    checkOutButton.style.color = "#FFFFFF"; // White text color
                <?php else : ?>
                    const checkOutTimeInput = document.getElementById("check_out_time");
                    checkOutTimeInput.value = getCurrentDateTime();
                <?php endif; ?>

            });
        </script>

        <script>
            // Get the current date in the format "YYYY-MM-DD"
            var currentDate = new Date().toISOString().split('T')[0];

            // Set the default value of the input field
            document.getElementById("dateField").value = currentDate;
        </script>
        <script>
            // Get the current date in the format "YYYY-MM-DD"
            var currentDate = new Date().toISOString().split('T')[0];

            // Set the default value of the input field
            document.getElementById("dateFieldd").value = currentDate;
        </script>
    </div>
</body>

</html>