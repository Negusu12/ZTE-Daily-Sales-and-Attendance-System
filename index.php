<?php
session_start();
include 'backend/insert.php';

include("connect.php");
include("functions.php");

$user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daily Sales</title>
  <link rel="icon" type="image/png" href="images/logo.png" />
  <link rel="stylesheet" href="css/sweetalert2.min.css">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #03949B;
      margin: 0;
      padding: 0;
      color: #26225B;
    }

    .div-logout {
      text-align: right;
      padding: 10px;
    }

    .class-logout {
      color: #555;
      text-decoration: none;
    }

    .username {
      text-align: center;
      font-size: 20px;
      margin-top: 20px;
    }

    form {
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }



    .info {
      margin-top: 20px;
    }

    .info h1 {
      font-size: 16px;
      font-family: "Times New Roman", Times, serif;
      margin-bottom: 5px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }



    th {
      background-color: #f2f2f2;
    }

    input[type="number"] {
      width: 60px;
    }

    input[type="textarea"] {
      width: 100%;
      height: 100px;
      padding: 5px;
    }

    .submit {
      margin-top: 20px;
      text-align: center;
    }

    .error-message {
      color: red;
    }

    .success-message {
      color: green;
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


    @media (max-width: 618px) {
      form {
        width: 100%;
        padding: 10px;
        overflow-x: auto;
        /* Add overflow-x for small screens */
      }

      table {
        width: 100%;
        margin-top: 10px;
        border-collapse: collapse;
      }

      th,
      td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        box-sizing: border-box;
        /* Add box-sizing for small screens */
      }

      input[type="number"],
      input[type="text"],
      input[type="textarea"],
      select {
        width: 100%;
        padding: 8px;
        font-size: 14px;
        box-sizing: border-box;
        /* Add box-sizing for small screens */
      }

      input[type="submit"] {
        padding: 12px;
      }

      .div-logout,
      .div-signup {
        text-align: center;
        margin-bottom: 10px;
      }

      .class-signup {
        font-size: 14px;
      }

      .class-logout,
      .class-signup {
        display: block;
        text-decoration: none;
        color: #414142;
        font-weight: bold;
        font-size: 14px;
        margin-bottom: 10px;
      }

      .username {
        font-size: 18px;
        margin-top: 5px;
      }

      .info {
        margin-top: 10px;
      }

      /* Ensure the third <td> stays within the border */
      td:nth-child(3) {
        max-width: 33%;
        /* You can adjust the value as needed */
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
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
        <option value="5">Attendance Sheet</option>
        <option value="6">Monthly Attendance Sheet</option>
      </select>
    <?php endif; ?>

    <?php if ($user_data['role'] == 2) : ?>
      <select class="input100" id="text" name="role" onchange="redirectToPage()">
        <option value="">Select Option</option>
        <option value="4">Attendance</option>
      </select>
    <?php endif; ?>
    <div class="username"> Hello <?php echo $user_data['promoter_name']; ?>!</div>

    <form method="post" enctype="multipart/form-data">
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
              <th>Model</th>
              <th>Available Stock/Morning</th>
              <th>Number of Apparatus Sold</th>
              <th>Net Stock at the end of the Day</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>A33 CORE</td>
              <td><input type="number" name="a33_core_available" id="a33_core_available"></td>
              <td><input type="number" name="a33_core_sold" id="a33_core_sold" oninput="calculateStock('a33_core')"></td>
              <td><input type="number" name="a33_core_left" id="a33_core_left" readonly class="ro"></td>
            </tr>
            <tr>
              <td>A31 Lite</td>
              <td><input type="number" name="a31_lite_available" id="a31_lite_available"></td>
              <td><input type="number" name="a31_lite_sold" id="a31_lite_sold" oninput="calculateStock('a31_lite')"></td>
              <td><input type="number" name="a31_lite_left" id="a31_lite_left" readonly class="ro"></td>
            </tr>
            <tr>
              <td>Blade A31</td>
              <td><input type="number" name="blade_a31_available" id="blade_a31_available"></td>
              <td><input type="number" name="blade_a31_sold" id="blade_a31_sold" oninput="calculateStock('blade_a31')"></td>
              <td><input type="number" name="blade_a31_left" id="blade_a31_left" readonly class="ro"></td>
            </tr>
            <tr>
              <td>Blade A51</td>
              <td><input type="number" name="blade_a51_available" id="blade_a51_available"></td>
              <td><input type="number" name="blade_a51_sold" id="blade_a51_sold" oninput="calculateStock('blade_a51')"></td>
              <td><input type="number" name="blade_a51_left" id="blade_a51_left" readonly class="ro"></td>
            </tr>
            <tr>
              <td>Blade A71</td>
              <td><input type="number" name="blade_a71_available" id="blade_a71_available"></td>
              <td><input type="number" name="blade_a71_sold" id="blade_a71_sold" oninput="calculateStock('blade_a71')"></td>
              <td><input type="number" name="blade_a71_left" id="blade_a71_left" readonly class="ro"></td>
            </tr>
            <tr>
              <td>Blade V30</td>
              <td><input type="number" name="blade_v30_available" id="blade_v30_available"></td>
              <td><input type="number" name="blade_v30_sold" id="blade_v30_sold" oninput="calculateStock('blade_v30')"></td>
              <td><input type="number" name="blade_v30_left" id="blade_v30_left" readonly class="ro"></td>
            </tr>
            <tr>
              <td>MF971L</td>
              <td><input type="number" name="mf971L_available" id="mf971L_available"></td>
              <td><input type="number" name="mf971L_sold" id="mf971L_sold" oninput="calculateStock('mf971L')"></td>
              <td><input type="number" name="mf971L_left" id="mf971L_left" readonly class="ro"></td>
            </tr>
            <tr>
              <td>MF286C</td>
              <td><input type="number" name="mf286c_available" id="mf286c_available"></td>
              <td><input type="number" name="mf286c_sold" id="mf286c_sold" oninput="calculateStock('mf286c')"></td>
              <td><input type="number" name="mf286c_left" id="mf286c_left" readonly class="ro"></td>
            </tr>
          </tbody>
        </table>
        <br>
        <div class="info">
          <input type="textarea" name="remark" placeholder="Remark">
        </div><br>
        <input type="submit" name="submit">
    </form>
  <?php endif; ?>
  <script src="js/sweetalert2.min.js"></script>

  <!--Subtraction -->
  <script>
    function calculateStock(model) {
      var availableStock = parseInt(document.getElementById(model + '_available').value) || 0;
      var soldApparatus = parseInt(document.getElementById(model + '_sold').value) || 0;
      var netStock = availableStock - soldApparatus;
      document.getElementById(model + '_left').value = netStock >= 0 ? netStock : 0;
    }

    // Add event listeners for both input fields in each row
    ['a33_core', 'a31_lite', 'blade_a31', 'blade_a51', 'blade_a71', 'blade_v30', 'mf971L', 'mf286c'].forEach(function(model) {
      document.getElementById(model + '_available').addEventListener('input', function() {
        calculateStock(model);
      });

      document.getElementById(model + '_sold').addEventListener('input', function() {
        calculateStock(model);
      });
    });
  </script>
  <!--Subtraction End-->
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
        window.location.href = "attendance";
      } else if (selectedValue === "5") {
        window.location.href = "attendance_sheet";
      } else if (selectedValue === "6") {
        window.location.href = "report_monthly_attendance";
      }
    }
  </script>
  <!-- select box redirection end -->
  </div>
</body>

</html>