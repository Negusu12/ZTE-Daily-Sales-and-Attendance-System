<?php
session_start();

include("connect.php");
include("functions.php");

$user_data = check_login($con);

// Retrieve data from the database
$sql = "SELECT * FROM daily_sales";
$result = mysqli_query($con, $sql);

// Fetch unique ID numbers
$id = array();
while ($row = mysqli_fetch_assoc($result)) {
    $id[] = $row['id'];
}

// Remove duplicate ID numbers
$id = array_unique($id);

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
            <option value="3">Users</option>
        </select>
    <?php endif; ?>
    <div class="username"> Hellow <?php echo $user_data['user_name']; ?>
    </div>
    <!-- Rest of the form -->


    <?php
    // Iterate over the unique ID numbers and display each set of records in a separate table
    foreach ($id as $id) {
        $result = mysqli_query($con, "SELECT * FROM daily_sales WHERE id = '$id'");
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
                            $doc_date = date("d F Y", strtotime($row['doc_date']));

                            echo "<tr>";
                            echo "<td rowspan='8' style='vertical-align: middle; text-align: center;'>" . $row['promoter_name'] . "</td>";
                            echo "<td rowspan='8' style='vertical-align: middle; text-align: center;'>" . $row['promoter_phone'] . "</td>";
                            echo "<td rowspan='8' style='vertical-align: middle; text-align: center;'>" . $row['shop'] . "</td>";
                            echo "<td> A33 CORE </td>";
                            echo "<td>" . $row['a33_core_available'] . "</td>";
                            echo "<td>" . $row['a33_core_sold'] . "</td>";
                            echo "<td>" . $row['a33_core_left'] . "</td>";
                            echo "<td rowspan='8' style='vertical-align: middle; text-align: center;'>" . date('l F j Y H:i', strtotime($row['doc_date'])) . "</td>";
                            echo "<td rowspan='8' style='vertical-align: middle; text-align: center;'>" . $row['remark'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td> A31 Lite </td>";
                            echo "<td>" . $row['a31_lite_available'] . "</td>";
                            echo "<td>" . $row['a31_lite_sold'] . "</td>";
                            echo "<td>" . $row['a31_lite_left'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td> Blade A31 </td>";
                            echo "<td>" . $row['blade_a31_available'] . "</td>";
                            echo "<td>" . $row['blade_a31_sold'] . "</td>";
                            echo "<td>" . $row['blade_a31_left'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td> Blade A51 </td>";
                            echo "<td>" . $row['blade_a51_available'] . "</td>";
                            echo "<td>" . $row['blade_a51_sold'] . "</td>";
                            echo "<td>" . $row['blade_a51_left'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td> Blade A71 </td>";
                            echo "<td>" . $row['blade_a71_available'] . "</td>";
                            echo "<td>" . $row['blade_a71_sold'] . "</td>";
                            echo "<td>" . $row['blade_a71_left'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td> Blade V30 </td>";
                            echo "<td>" . $row['blade_v30_available'] . "</td>";
                            echo "<td>" . $row['blade_v30_sold'] . "</td>";
                            echo "<td>" . $row['blade_v30_left'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td> MF971L </td>";
                            echo "<td>" . $row['mf971L_available'] . "</td>";
                            echo "<td>" . $row['mf971L_sold'] . "</td>";
                            echo "<td>" . $row['mf971L_left'] . "</td>";
                            echo "</tr>";
                            echo "<td> MF286C </td>";
                            echo "<td>" . $row['mf286c_available'] . "</td>";
                            echo "<td>" . $row['mf286c_sold'] . "</td>";
                            echo "<td>" . $row['mf286c_left'] . "</td>";
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
            var table = $('#mydatatable').DataTable({
                ordering: true,
                buttons: ['excel', 'pdf', 'colvis'],
                pagingType: 'full_numbers',
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });


            table.columns().every(function() {
                var that = this;
                $('input', this.header()).on('keyup change', function() {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
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
                window.location.href = "attendance_sheet";
            } else if (selectedValue === "2") {
                window.location.href = "report_weekly_sales.php";
            } else if (selectedValue === "3") {
                window.location.href = "users";
            }
        }
    </script>
    <!-- select box redirection end -->

</body>

</html>