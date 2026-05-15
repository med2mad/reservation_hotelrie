<?php
include("../config/db.php");
$conn->query("DELETE FROM chambres WHERE id=".$_GET['id']);
$redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../chambres.php';
header("Location: $redirect");
?>
