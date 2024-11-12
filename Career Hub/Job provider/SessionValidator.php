<?php
session_start();
if(!(isset($_SESSION['jobproviderid']) && !empty($_SESSION['jobproviderid']))) {
    header("location:../login");
}
?>