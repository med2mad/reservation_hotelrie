<?php include("../config/db.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Chambres - Hotel Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php include("../includes/navbar.php"); ?>

<div class="admin-container">

<h2 class="admin-title">Gestion des chambres</h2>

<a href="ajouter_chambre.php" class="btn-add">+ Ajouter chambre</a>

<div class="admin-cards">

<?php
$result = $conn->query("SELECT * FROM chambres");

while($row = $result->fetch_assoc()){
?>

<div class="admin-card">
    <h3><?php echo $row['nom']; ?></h3>

    <span class="badge badge-money">💰 <?php echo $row['prix']; ?> DH / nuit</span><br>
    <span class="badge badge-poste">📝 <?php echo $row['description']; ?></span><br>
    <?php if(!empty($row['image'])): ?>
    <img src="../images/<?php echo $row['image']; ?>" style="width:100%; height:120px; object-fit:cover; border-radius:8px; margin-top:10px;">
    <?php endif; ?>

    <div class="admin-actions">
        <a href="modifier_chambre.php?id=<?php echo $row['id']; ?>">
            <button class="btn">Modifier</button>
        </a>
        <a href="supprimer_chambre.php?id=<?php echo $row['id']; ?>">
            <button class="btn">Supprimer</button>
        </a>
    </div>
</div>

<?php } ?>

</div>
</div>

</body>
</html>
