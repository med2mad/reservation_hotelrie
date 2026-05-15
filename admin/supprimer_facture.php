<?php
include("../config/db.php");
$conn->query("DELETE FROM factures WHERE id=".$_GET['id']);
header("Location: factures.php");
?>
