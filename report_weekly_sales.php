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
    <title>Report Weekly Sales</title>
    <link rel="icon" type="image/png" href="images/logo.png" />
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/bootstrap/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="css/bootstrap/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="css/admin.css">

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
    <div class="username"> Report Weekly Sales
    </div>
    <!-- Rest of the form -->

    <?php if ($user_data['role'] == 1) : ?>
        <select class="input100" id="text" name="role" onchange="redirectToPage()">
            <option value="">Reports</option>
            <option value="1">Report Daily Sales</option>
            <option value="2">Attendance Sheet</option>
            <option value="5">Monthly Attendance Sheet</option>
            <option value="3">Users</option>
        </select>
    <?php endif; ?>
    <?php {
        $result = mysqli_query($con, "SELECT * FROM weekly_sales_report");
    ?>

        <section class="tbl-header table-responsive">

            <div class="table-responsive" id="no-more-tables">
                <table class="table bg-white mydatatable" id="mydatatable">
                    <thead class="tbll text-light">
                        <tr>
                            <th>Promoter's Name</th>
                            <th>Shop</th>
                            <th>week_number</th>
                            <th>week_start_date</th>
                            <th>week_end_date</th>
                            <th>a33_core_sold</th>
                            <th>a31_lite_sold</th>
                            <th>blade_a31_sold</th>
                            <th>blade_a51_sold</th>
                            <th>blade_a71_sold</th>
                            <th>blade_v30_sold</th>
                            <th>mf971L_sold</th>
                            <th>mf286c_sold</th>
                            <th>Total Sold</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Iterate over the retrieved data and display in table rows

                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<tr>";
                            echo "<td>" . $row['promoter_name'] . "</td>";
                            echo "<td>" . $row['shop'] . "</td>";
                            echo "<td>" . $row['week_number'] . "</td>";
                            echo "<td>" . date('l F j Y H:i', strtotime($row['week_start_date'])) . "</td>";
                            echo "<td>" . date('l F j Y H:i', strtotime($row['week_end_date'])) . "</td>";
                            echo "<td>" . $row['total_a33_core_sold'] . "</td>";
                            echo "<td>" . $row['total_a31_lite_sold'] . "</td>";
                            echo "<td>" . $row['total_blade_a31_sold'] . "</td>";
                            echo "<td>" . $row['total_blade_a51_sold'] . "</td>";
                            echo "<td>" . $row['total_blade_a71_sold'] . "</td>";
                            echo "<td>" . $row['total_blade_v30_sold'] . "</td>";
                            echo "<td>" . $row['total_mf971L_sold'] . "</td>";
                            echo "<td>" . $row['total_mf286c_sold'] . "</td>";
                            echo "<td>" . $row['total_sold'] . "</td>";

                            echo "</tr>";
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

                // Create the text input element
                var input = $('<input type="text" class="form-control" placeholder="Filter"/>')
                    .appendTo($(this.header()))
                    .on('keyup change', function() {
                        that.search($(this).val()).draw();
                    });
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
                window.location.href = "attendance_sheet.php";
            } else if (selectedValue === "3") {
                window.location.href = "users";
            } else if (selectedValue === "5") {
                window.location.href = "report_monthly_attendance";
            }
        }
    </script>
    <!-- select box redirection end -->

</body>

</html>