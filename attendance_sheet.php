<?php
session_start();

include("connect.php");
include("functions.php");

$user_data = check_login($con);

if ($user_data['role'] == 2) {
    // Redirect or display an error message
    header("Location: login"); // Redirect to login page
    exit();
}

$sql = "SELECT * FROM combined_attendance_view where status='Active' and 1=1";

// Date range filter
if (isset($_POST['from_date']) && isset($_POST['to_date'])) {
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];

    // Validate date format (you may need to adjust this based on your needs)
    if (strtotime($from_date) && strtotime($to_date)) {
        $sql .= " AND date BETWEEN '$from_date 00:00:00' AND '$to_date 23:59:59'";
    } else {
        // Handle invalid date format if needed
        // You can add an error message or redirect back to the form with an error
    }
}

// Type filter
if (isset($_POST['type'])) {
    $type = $_POST['type'];
    if ($type == 'comment') {
        $sql .= " AND type = 'comment'";
    } elseif ($type == 'partner') {
        $sql .= " AND type = 'partner'";
    }
}

// Continue with the existing code...

$result = $con->query($sql);
if (!$result) {
    die("Invalid query!");
}

?>



<!DOCTYPE html>
<html>

<head>
    <title>Attendance Sheet</title>
    <link rel="icon" type="image/png" href="images/logo.png" />
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/bootstrap/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="css/bootstrap/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="css/bootstrap/flatpickr.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">

    <style>
        @media only screen and (max-width:800px) {

            #no-more-tables tbody,
            #no-more-tables tr,
            #no-more-tables td {
                display: block;
            }

            #no-more-tables thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            #no-more-tables td {
                position: relative;
                padding-left: 50%;
                border: none;
                border-bottom: 1px solid #eee;
            }

            #no-more-tables td:before {
                content: attr(data-title);
                position: absolute;
                left: 6px;
                font-weight: bold;
            }

            #no-more-tables tr {
                border-bottom: 1px solid #ccc;
            }
        }

        .s_form {
            background-color: #ffffff;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            margin-bottom: 20px;
            width: 35%;
        }

        .form-group {
            margin-bottom: 20px;
            display: inline-block;
            margin-right: 10px;
        }

        .labela1 {
            font-weight: bold;
        }

        .submita1 {
            background-color: #007bff;
            color: #ffffff;
        }

        .submita1:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body>
    <div class="div-logout">
        <a href="logout.php" class="class-logout">Logout</a><br>
    </div>
    <div class="username"> Attendance Sheet
    </div>
    <!-- Rest of the form -->

    <select class="input100" id="text" name="role" onchange="redirectToPage()">
        <option value="">Reports</option>
        <option value="1">Report Daily Sales</option>
        <option value="2">Report Weekly Sales</option>
        <option value="7">Report Monthly Sales</option>
        <option value="6">Monthly Attendance Sheet</option>
        <option value="3">Users</option>
    </select>
    <form method="post" action="" class="s_form form-inline">
        <div class="form-group">
            <label for="from_date">From Date:</label>
            <input type="date" class="form-control" name="from_date" id="from_date" value="<?php echo isset($_POST['from_date']) ? $_POST['from_date'] : ''; ?>">
        </div>

        <div class="form-group">
            <label for="to_date">To Date:</label>
            <input type="date" class="form-control" name="to_date" id="to_date" value="<?php echo isset($_POST['to_date']) ? $_POST['to_date'] : ''; ?>">
        </div>

        <button type="submit" class="btn btn-primary submita1">Filter</button>
    </form>

    <?php {
    ?>

        <section class="tbl-header table-responsive">

            <div class="table-responsive" id="no-more-tables">
                <table class="table bg-white mydatatable" id="mydatatable">
                    <thead class="tbll text-light">
                        <tr>
                            <th>Sl_No</th>
                            <th>promoter_name</th>
                            <th>Shop</th>
                            <th>Date</th>
                            <th>Check In</th>
                            <th>Check In time</th>
                            <th>Check in Remark</th>
                            <th>Check In Location</th>
                            <th>Check Out</th>
                            <th>Check Out time</th>
                            <th> Check Out remark</th>
                            <th>Check Out Location</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Initialize a counter variable
                        $rowCounter = 1;

                        // Iterate over the retrieved data and display in table rows
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $rowCounter . "</td>"; // Display the counter value
                            echo "<td>" . $row['promoter_name'] . "</td>";
                            echo "<td>" . $row['shop'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['check_in'] . "</td>";
                            echo "<td>" . $row['attendance_time'] . "</td>";
                            echo "<td>" . $row['remark_check_in'] . "</td>";
                            if (!empty($row['latitude']) && !empty($row['longitude'])) {
                                // Convert latitude and longitude to a Google Maps link
                                $mapsLink = "https://www.google.com/maps?q=" . $row['latitude'] . "," . $row['longitude'];
                                echo "<td><a href='$mapsLink' target='_blank'>Check In Location</a></td>";
                            } else {
                                echo "<td></td>"; // Display an empty cell if latitude or longitude is empty
                            }
                            echo "<td>" . $row['check_out'] . "</td>";
                            echo "<td>" . $row['check_out_time'] . "</td>";
                            echo "<td>" . $row['remark_check_out'] . "</td>";
                            if (!empty($row['latitude_check_out']) && !empty($row['longitude_check_out'])) {
                                // Convert latitude and longitude to a Google Maps link
                                $mapsLink = "https://www.google.com/maps?q=" . $row['latitude_check_out'] . "," . $row['longitude_check_out'];
                                echo "<td><a href='$mapsLink' target='_blank'>Check Out Location</a></td>";
                            } else {
                                echo "<td></td>"; // Display an empty cell if latitude or longitude is empty
                            }




                            echo "</tr>";

                            // Increment the counter for the next row
                            $rowCounter++;
                        }
                        ?>
                    </tbody>
                </table>
                <br>
            </div>
        </section>

    <?php
    }
    ?>

    <script src="js/sweetalert2.min.js"></script>

    <script src="js/jquery/jquery-3.3.1.min.js"></script>
    <script src="js/jquery/jquery.dataTables.min.js"></script>
    <script src="js/bootstrap/dataTables.bootstrap4.min.js"></script>

    <script src="js/bootstrap/dataTables.buttons.min.js"></script>
    <script src="js/bootstrap/buttons.bootstrap4.min.js"></script>
    <script src="js/bootstrap/jszip.min.js"></script>
    <script src="js/bootstrap/pdfmake.min.js"></script>
    <script src="js/bootstrap/vfs_fonts.js"></script>
    <script src="js/bootstrap/buttons.html5.min.js"></script>
    <script src="js/bootstrap/buttons.print.min.js"></script>
    <script src="js/bootstrap/buttons.colVis.min.js"></script>
    <script src="js/bootstrap/dataTables.responsive.min.js"></script>
    <script src="js/bootstrap/buttons.bootstrap4.min.js"></script>
    <script src="js/bootstrap/flatpickr.js"></script>


    <script>
        $(document).ready(function() {
            // Check if DataTable is already initialized
            var isDataTableInitialized = $.fn.DataTable.isDataTable('#mydatatable');

            // If DataTable is initialized, destroy it
            if (isDataTableInitialized) {
                $('#mydatatable').DataTable().destroy();
            }

            // Initialize DataTable
            var table = $('#mydatatable').DataTable({
                ordering: true,
                buttons: ['excel', 'pdf', 'colvis'],
                pagingType: 'full_numbers',
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });

            // Add a text input for each column in the header
            table.columns().every(function() {
                var that = this;
                var columnTitle = $(this.header()).text().trim();

                // Create the input element based on the column title
                var input;
                if (columnTitle === 'Date' || columnTitle === 'Check In time' || columnTitle === 'Check Out time') {
                    // Create a date picker element
                    input = $('<input type="text" class="form-control" placeholder="Filter"/>')
                        .appendTo($(this.header()))
                        .on('change', function() {
                            that.search($(this).val()).draw();
                        });

                    // Initialize the date picker
                    flatpickr(input[0], {
                        dateFormat: 'Y-m-d',
                        onChange: function(selectedDates) {
                            if (selectedDates.length > 0) {
                                var formattedDate = selectedDates[0].toISOString().split('T')[0];
                                input.val(formattedDate);
                                input.trigger('change');
                            }
                        }
                    });
                } else {
                    // Create a regular text input element for other columns
                    input = $('<input type="text" class="form-control" placeholder="Filter"/>')
                        .appendTo($(this.header()))
                        .on('keyup change', function() {
                            that.search($(this).val()).draw();
                        });
                }
            });

            table.buttons().container()
                .appendTo('#mydatatable_wrapper .col-md-6:eq(0)');

        });
    </script>
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
            } else if (selectedValue === "7") {
                window.location.href = "report_monthly_sales";

            }
        }
    </script>
    <!-- select box redirection end -->


</body>

</html>