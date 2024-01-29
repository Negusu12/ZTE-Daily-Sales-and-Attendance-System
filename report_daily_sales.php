<?php
session_start();

include("connect.php");
include("functions.php");

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>

<head>
    <title> Report Daily Sales</title>
    <link rel="icon" type="image/png" href="images/logo.png" />
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/bootstrap/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="css/bootstrap/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="css/bootstrap/flatpickr.min.css">
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
        <a href="logout.php" class="class-logout">Logout</a>
    </div>
    <?php if ($user_data['role'] == 1) : ?>
        <select class="input100" id="text" name="role" onchange="redirectToPage()">
            <option value="">Reports</option>
            <option value="2">Report Weekly Sales</option>
            <option value="1">Attendance Sheet</option>
            <option value="5">Monthly Attendance Sheet</option>
            <option value="3">Users</option>
        </select>
    <?php endif; ?>
    <div class="username"> Report Daily Sales
    </div>
    <!-- Rest of the form -->


    <?php
    // Iterate over the unique ID numbers and display each set of records in a separate table
    {
        $result = mysqli_query($con, "SELECT * FROM daily_sales_view");
    ?>
        <section class="tbl-header table-responsive">

            <div class="table-responsive" id="no-more-tables">
                <table class="table bg-white mydatatable" id="mydatatable">
                    <thead class="tbll text-light">
                        <tr>
                            <th>Promoter's Name</th>
                            <th>Promoter's Phone Number</th>
                            <th>Shop</th>
                            <th>Model</th>
                            <th>Available Stock/Morning</th>
                            <th>Number of Apparatus Sold</th>
                            <th>Net Stock at the end of the Day</th>
                            <th>Document Date</th>
                            <th>Remark</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Iterate over the retrieved data and display in table rows

                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<tr>";
                            echo "<td>" . $row['promoter_name'] . "</td>";
                            echo "<td>" . $row['promoter_phone'] . "</td>";
                            echo "<td>" . $row['shop'] . "</td>";
                            echo "<td>" . $row['model'] . "</td>";
                            echo "<td>" . $row['available_stock'] . "</td>";
                            echo "<td>" . $row['apparatus_sold'] . "</td>";
                            echo "<td>" . $row['net_stock'] . "</td>";
                            echo "<td>" . $row['document_date'] . "</td>";
                            echo "<td>" . $row['remark_w'] . "</td>";
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
                if (columnTitle === 'Document Date') {
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
                window.location.href = "attendance_sheet";
            } else if (selectedValue === "2") {
                window.location.href = "report_weekly_sales.php";
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