<?php include("../config/db.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Clients - Hotel Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php include("../includes/navbar.php"); ?>

<div class="admin-container">

<h2 class="admin-title">Gestion des clients</h2>

<a href="ajouter_client.php" class="btn-add">+ Ajouter client</a>

<div class="admin-cards">

<?php
$result = $conn->query("SELECT * FROM clients");

while($row = $result->fetch_assoc()){
?>

<div class="admin-card">
    <h3><?php echo $row['nom']; ?></h3>

    <span class="badge badge-email">📧 <?php echo $row['email']; ?></span><br>
    <span class="badge badge-phone">📞 <?php echo $row['telephone']; ?></span>

    <div class="admin-actions">
        <a href="modifier_client.php?id=<?php echo $row['id']; ?>">
            <button class="btn">Modifier</button>
        </a>
        <a href="supprimer_client.php?id=<?php echo $row['id']; ?>">
            <button class="btn">Supprimer</button>
        </a>
    </div>
</div>

<?php } ?>

</div>
</div>

</body>
</html>