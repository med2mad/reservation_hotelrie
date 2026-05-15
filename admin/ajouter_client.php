<?php include("../config/db.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Client - Hotel Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php include("../includes/navbar.php"); ?>

<div class="admin-container">

<h2 class="admin-title">Ajouter un client</h2>

<form method="POST">
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="tel" placeholder="Téléphone">
    <button class="btn-add">Ajouter</button>
</form>

</div>

<?php
if($_POST){
    $conn->query("INSERT INTO clients (nom,email,telephone)
                  VALUES ('$_POST[nom]','$_POST[email]','$_POST[tel]')");
    header("Location: clients.php");
}
?>

</body>
</html>