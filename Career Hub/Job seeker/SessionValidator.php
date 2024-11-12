<?php
session_start();
if(!(isset($_SESSION['jobseekerid']) && !empty($_SESSION['jobseekerid']))) {
    header("location:../login");
}
?>