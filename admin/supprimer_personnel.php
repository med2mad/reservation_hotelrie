<?php
include("../config/db.php");
$conn->query("DELETE FROM personnel WHERE id=".$_GET['id']);
header("Location: personnel.php");
?>
