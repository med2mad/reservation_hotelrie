<?php include("../config/db.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Personnel - Hotel Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php include("../includes/navbar.php"); ?>

<div class="admin-container">

<h2 class="admin-title">Gestion du personnel</h2>

<a href="ajouter_personnel.php" class="btn-add">+ Ajouter personnel</a>

<div class="admin-cards">

<?php
$result = $conn->query("SELECT * FROM personnel");

while($row = $result->fetch_assoc()){
?>

<div class="admin-card">
    <h3><?php echo $row['nom']; ?></h3>

    <span class="badge badge-poste">💼 <?php echo $row['poste']; ?></span><br>
    <span class="badge badge-phone">📞 <?php echo $row['telephone']; ?></span><br>
    <span class="badge badge-money">💰 <?php echo $row['salaire']; ?> DH</span><br>
    <span class="badge badge-date">📅 <?php echo $row['date_embauche']; ?></span>

    <div class="admin-actions">
        <a href="modifier_personnel.php?id=<?php echo $row['id']; ?>">
            <button class="btn">Modifier</button>
        </a>
        <a href="supprimer_personnel.php?id=<?php echo $row['id']; ?>">
            <button class="btn">Supprimer</button>
        </a>
    </div>
</div>

<?php } ?>

</div>
</div>

</body>
</html>
