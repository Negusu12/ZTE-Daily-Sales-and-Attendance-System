<?php
session_start();

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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .div-logout {
            text-align: right;
            margin-bottom: 20px;
        }

        .class-logout {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .username {
            font-size: 18px;
            margin-top: 10px;
        }

        section {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        @media only screen and (max-width: 800px) {

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

        input[type="text"] {
            padding: 8px;
            box-sizing: border-box;
        }

        #search-form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 8px;
            box-sizing: border-box;
        }

        #search-form {
            margin-bottom: 20px;
        }

        #datepicker {
            padding: 8px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <div class="div-logout">
        <a href="logout.php" class="class-logout">Logout</a>
    </div>
    <div class="username"> Hello <?php echo $user_data['user_name']; ?>!</div>
    <form id="search-form">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" placeholder="Enter keyword">
        <label for="datepicker-from">Date From:</label>
        <input type="text" id="datepicker-from" name="datepicker-from" placeholder="Select start date">
        <label for="datepicker-to">Date To:</label>
        <input type="text" id="datepicker-to" name="datepicker-to" placeholder="Select end date">
    </form>
    <button id="export-excel">Export to Excel</button>
    <button id="export-pdf">Export to PDF</button>
    <?php
    $result = mysqli_query($con, "SELECT * FROM daily_sales");
    ?>
    <section>
        <div>
            <table id="no-more-tables">
                <thead>
                    <tr>
                        <th>Promoter's Name</th>
                        <th>Promoter's Phone Number</th>
                        <th>Shop</th>
                        <th>Model</th>
                        <th>Available Stock/Morning</th>
                        <th>Number of Apparatus Sold</th>
                        <th>Net Stock at the end of the Day</th>
                        <th>Document Date</th>
                    </tr>
                </thead>
                <tbody id="filtered-data-body">
                    <?php
                    // Iterate over the retrieved data and display in table rows
                    while ($row = mysqli_fetch_assoc($result)) {
                        $doc_date = date("d F Y", strtotime($row['doc_date']));

                        echo "<tr>";
                        echo "<td  style='vertical-align: middle; text-align: center;'>" . $row['promoter_name'] . "</td>";
                        echo "<td  style='vertical-align: middle; text-align: center;'>" . $row['promoter_phone'] . "</td>";
                        echo "<td  style='vertical-align: middle; text-align: center;'>" . $row['shop'] . "</td>";
                        echo "<td> A33 CORE </td>";
                        echo "<td>" . $row['a33_core_available'] . "</td>";
                        echo "<td>" . $row['a33_core_sold'] . "</td>";
                        echo "<td>" . $row['a33_core_left'] . "</td>";
                        echo "<td style='vertical-align: middle; text-align: center;'>" . date('l F j Y H:i', strtotime($row['doc_date'])) . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td> A31 Lite </td>";
                        echo "<td>" . $row['a31_lite_available'] . "</td>";
                        echo "<td>" . $row['a31_lite_sold'] . "</td>";
                        echo "<td>" . $row['a31_lite_left'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td> Blade A31 </td>";
                        echo "<td>" . $row['blade_a31_available'] . "</td>";
                        echo "<td>" . $row['blade_a31_sold'] . "</td>";
                        echo "<td>" . $row['blade_a31_left'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td> Blade A51 </td>";
                        echo "<td>" . $row['blade_a51_available'] . "</td>";
                        echo "<td>" . $row['blade_a51_sold'] . "</td>";
                        echo "<td>" . $row['blade_a51_left'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td> Blade A71 </td>";
                        echo "<td>" . $row['blade_a71_available'] . "</td>";
                        echo "<td>" . $row['blade_a71_sold'] . "</td>";
                        echo "<td>" . $row['blade_a71_left'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td> Blade V30 </td>";
                        echo "<td>" . $row['blade_v30_available'] . "</td>";
                        echo "<td>" . $row['blade_v30_sold'] . "</td>";
                        echo "<td>" . $row['blade_v30_left'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td> MF971L </td>";
                        echo "<td>" . $row['mf971L_available'] . "</td>";
                        echo "<td>" . $row['mf971L_sold'] . "</td>";
                        echo "<td>" . $row['mf971L_left'] . "</td>";
                        echo "</tr>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
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

    <script src="js/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <!-- Include jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            // Add datepicker functionality for Date From
            $("#datepicker-from").datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function(dateText, inst) {
                    filterByDateAndSearch();
                }
            });

            // Add datepicker functionality for Date To
            $("#datepicker-to").datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function(dateText, inst) {
                    filterByDateAndSearch();
                }
            });

            // Apply filtering when the user types in the search box
            $("#search").on("keyup", function() {
                filterByDateAndSearch();
            });

            function filterByDateAndSearch() {
                var startDate = $("#datepicker-from").datepicker("getDate");
                var endDate = $("#datepicker-to").datepicker("getDate");
                var searchValue = $("#search").val().toLowerCase();

                $("tbody tr").each(function() {
                    var rowDate = new Date($(this).find("td:last").text());
                    rowDate.setHours(0, 0, 0, 0);

                    var showRow = true;

                    // Filter by date range
                    if (startDate && endDate) {
                        showRow = rowDate >= startDate && rowDate <= endDate;
                    }

                    // Filter by search
                    if (showRow && searchValue) {
                        var rowText = $(this).text().toLowerCase();
                        showRow = rowText.indexOf(searchValue) > -1;
                    }

                    $(this).toggle(showRow);
                });
                $(this).find("td:lt(3)").css("visibility", showRow ? "visible" : "hidden");

                // Show or hide the corresponding Model rows
                $("tbody tr:visible").each(function() {
                    var modelName = $(this).find("td:eq(3)").text();
                    if (modelName !== "") {
                        var modelRows = $("tbody tr:visible").filter(function() {
                            return $(this).find("td:eq(3)").text() === modelName;
                        });

                        if (modelRows.length > 1) {
                            modelRows.not(":first").find("td:lt(3)").css("visibility", "hidden");
                        }
                    }
                });
            }
        });
        $(document).ready(function() {
            // ... Your existing code ...

            // Export to Excel
            $("#export-excel").on("click", function() {
                exportToExcel();
            });

            // Export to PDF
            $("#export-pdf").on("click", function() {
                exportToPDF();
            });

            function exportToExcel() {
                var htmltable = document.getElementById('no-more-tables');
                var excel_data = [
                    ['Promoter\'s Name', 'Promoter\'s Phone Number', 'Shop', 'Model', 'Available Stock/Morning', 'Number of Apparatus Sold', 'Net Stock at the end of the Day', 'Document Date']
                ];

                // Get only visible rows
                var visibleRows = $("#no-more-tables tbody tr:visible");

                // Iterate over the visible rows and add data to excel_data
                visibleRows.each(function() {
                    var cols = $(this).find('td');
                    var data = [];
                    cols.each(function() {
                        data.push($(this).text());
                    });
                    excel_data.push(data);
                });

                var sheet = XLSX.utils.aoa_to_sheet(excel_data);
                var wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, sheet, 'Sheet1');
                XLSX.writeFile(wb, 'daily_sales.xlsx');
            }

            function exportToPDF() {
                var pdf = new jsPDF('p', 'pt', 'letter');
                pdf.autoTable({
                    html: '#no-more-tables',
                    styles: {
                        cellPadding: 4,
                        fontSize: 10
                    },
                    columnStyles: {
                        3: {
                            cellWidth: 'auto'
                        }
                    } // Adjust the width of the 'Model' column
                });
                pdf.save('daily_sales.pdf');
            }
        });
    </script>
</body>

</html>