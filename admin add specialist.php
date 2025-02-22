<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    die("<p style='color: red;'>Access Denied! Only Admins can add specialists.</p>");
}
?>