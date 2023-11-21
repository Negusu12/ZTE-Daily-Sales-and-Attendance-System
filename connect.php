<?php

$con = new mysqli('localhost', 'root', '', 'report_attendance');
if (!$con) {
    echo "Connection Succesful";
}
