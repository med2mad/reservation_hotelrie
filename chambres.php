<?php 
session_start();
include("config/db.php"); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Chambres</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include("includes/navbar.php"); ?>

<section class="rooms">
    <h2>Nos chambres</h2>

    <div style="display:flex; justify-content:center; gap:15px; margin-bottom:20px; flex-wrap:wrap; align-items:center;">
        <!-- Barre de recherche -->
        <form method="GET" class="search-box">
            <input type="text" name="search" placeholder="Rechercher une chambre">
            <button>Rechercher</button>
        </form>
        <?php if(isset($_SESSION['user'])): ?>
            <a href="admin/ajouter_chambre.php" class="btn-add">+ Ajouter chambre</a>
        <?php endif; ?>
    </div>

    <div class="cards">

<?php
$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM chambres WHERE nom LIKE '%$search%'";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
?>

    <div class="card">
        <img style="height:230px;" src="images/<?php echo $row['image']; ?>">
        
        <div class="card-content">
            <h3><?php echo $row['nom']; ?></h3>
            <p><?php echo $row['description']; ?></p>

            <span class="price"><?php echo $row['prix']; ?> DH / nuit</span>

            <a href="reservation.php?id=<?php echo $row['id']; ?>">
                <button>Réserver</button>
            </a>

            <?php if(isset($_SESSION['user'])): ?>
            <div class="admin-actions" style="margin-top:10px;">
                <a href="admin/modifier_chambre.php?id=<?php echo $row['id']; ?>">
                    <button class="btn btn-edit">Modifier</button>
                </a>
                <a href="admin/supprimer_chambre.php?id=<?php echo $row['id']; ?>">
                    <button class="btn btn-delete">Supprimer</button>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>

<?php } ?>

    </div>
</section>

</body>
</html>