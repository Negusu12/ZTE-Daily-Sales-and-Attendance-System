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

?>

<!DOCTYPE html>
<html>

<head>
    <title>Monthly Attendance Sheet</title>
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
    </style>

</head>

<body>
    <div class="div-logout">
        <a href="logout.php" class="class-logout">Logout</a><br>
        <a href="signup.php" class="class-logout">Signup</a>
    </div>
    <div class="username">Monthly Attendance Sheet
    </div>
    <!-- Rest of the form -->

    <select class="input100" id="text" name="role" onchange="redirectToPage()">
        <option value="">Reports</option>
        <option value="1">Report Daily Sales</option>
        <option value="2">Report Weekly Sales</option>
        <option value="3">Users</option>
    </select>

    <?php
    $result = mysqli_query($con, "SELECT * FROM monthly_attendance_view where status='Active'");
    ?>

    <section class="tbl-header table-responsive">
        <div class="table-responsive" id="no-more-tables">
            <table class="table bg-white mydatatable" id="mydatatable">
                <thead class="tbll text-light">
                    <tr>
                        <th>Sl_No</th>
                        <th>promoter_name</th>
                        <th>Month</th>
                        <th>Date</th>
                        <th>Check In</th>
                        <th>Check In time</th>
                        <th>Check Out</th>
                        <th>Check Out time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rowCounter = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $rowCounter . "</td>";
                        echo "<td>" . $row['promoter_name'] . "</td>";
                        echo "<td>" . $row['month'] . "</td>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "<td>" . $row['check_in'] . "</td>";
                        echo "<td>" . $row['attendance_time'] . "</td>";
                        echo "<td>" . $row['check_out'] . "</td>";
                        echo "<td>" . $row['check_out_time'] . "</td>";
                        echo "</tr>";
                        $rowCounter++;
                    }
                    ?>
                </tbody>
            </table>
            <br>
        </div>
    </section>

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
            }
        }
    </script>
    <!-- select box redirection end -->


</body>

</html>