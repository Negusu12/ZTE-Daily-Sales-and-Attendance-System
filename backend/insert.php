<?php

include('connect.php');

if (isset($_POST['submit'])) {

  $promoter_name = addslashes($_POST['promoter_name']);
  $promoter_phone = addslashes($_POST['promoter_phone']);
  $shop = addslashes($_POST['shop']);
  $a33_core_available = addslashes($_POST['a33_core_available']);
  $a31_lite_available = addslashes($_POST['a31_lite_available']);
  $a31_lite_sold = addslashes($_POST['a31_lite_sold']);
  $blade_a31_available = addslashes($_POST['blade_a31_available']);
  $blade_a51_available = addslashes($_POST['blade_a51_available']);
  $blade_a71_available = addslashes($_POST['blade_a71_available']);
  $blade_v30_available = addslashes($_POST['blade_v30_available']);
  $mf971L_available = addslashes($_POST['mf971L_available']);
  $mf286c_available = addslashes($_POST['mf286c_available']);
  $a33_core_sold = addslashes($_POST['a33_core_sold']);
  $blade_a31_sold = addslashes($_POST['blade_a31_sold']);
  $blade_a51_sold = addslashes($_POST['blade_a51_sold']);
  $blade_a71_sold = addslashes($_POST['blade_a71_sold']);
  $blade_v30_sold = addslashes($_POST['blade_v30_sold']);
  $mf971L_sold = addslashes($_POST['mf971L_sold']);
  $mf286c_sold = addslashes($_POST['mf286c_sold']);
  $a33_core_left = addslashes($_POST['a33_core_left']);
  $a31_lite_left = addslashes($_POST['a31_lite_left']);
  $blade_a31_left = addslashes($_POST['blade_a31_left']);
  $blade_a51_left = addslashes($_POST['blade_a51_left']);
  $blade_a71_left = addslashes($_POST['blade_a71_left']);
  $blade_v30_left = addslashes($_POST['blade_v30_left']);
  $mf971L_left = addslashes($_POST['mf971L_left']);
  $mf286c_left = addslashes($_POST['mf286c_left']);
  $remark = addslashes($_POST['remark']);

  $sql = "INSERT INTO `daily_sales`(`promoter_name`, `promoter_phone`, `shop`, `a33_core_available`, `a31_lite_available`, `a31_lite_sold`, `blade_a31_available`, `blade_a51_available`, `blade_a71_available`, `blade_v30_available`, `mf971L_available`, `mf286c_available`, `a33_core_sold`, `blade_a31_sold`, `blade_a51_sold`, `blade_a71_sold`, `blade_v30_sold`, `mf971L_sold`, `mf286c_sold`, `a33_core_left`, `a31_lite_left`, `blade_a31_left`, `blade_a51_left`, `blade_a71_left`, `blade_v30_left`, `mf971L_left`, `mf286c_left`, `remark`) VALUES ('$promoter_name', '$promoter_phone', '$shop', '$a33_core_available', '$a31_lite_available', '$a31_lite_sold', '$blade_a31_available', '$blade_a51_available', '$blade_a71_available', '$blade_v30_available', '$mf971L_available', '$mf286c_available', '$a33_core_sold', '$blade_a31_sold', '$blade_a51_sold', '$blade_a71_sold', '$blade_v30_sold', '$mf971L_sold', '$mf286c_sold', '$a33_core_left', '$a31_lite_left', '$blade_a31_left', '$blade_a51_left', '$blade_a71_left', '$blade_v30_left', '$mf971L_left', '$mf286c_left', '$remark')";

  $result = mysqli_query($con, $sql);

  if ($result) {
    echo "<script>
        window.onload = function() {
            Swal.fire({
                icon: 'success',
                title: 'Daily Sales Recorded Successfully',
                showConfirmButton: true,
                confirmButtonText: 'OK',
                timer: 2000
            }).then(function() {
                window.location.href = 'index.php';
            });
        }
    </script>";
  } else {
    echo "<script>
        window.onload = function() {
            Swal.fire({
                icon: 'error',
                title: 'Failed to Record Daily Sales',
                showConfirmButton: false,
                showDenyButton: true,
                denyButtonText: 'OK'
            });
        }
    </script>";
  }
}
