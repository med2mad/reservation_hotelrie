<?php
include("../config/db.php");
$id = $_GET['id'];
$conn->query("DELETE FROM reservations WHERE id=$id");
header("Location: reservations.php");
?>
