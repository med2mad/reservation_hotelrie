<?php include("../config/db.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Reservations - Hotel Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php include("../includes/navbar.php"); ?>

<div class="admin-container">

<h2 class="admin-title">Gestion des réservations</h2>

<div class="admin-cards">

<?php
$sql = "SELECT r.*, c.nom as chambre_nom 
        FROM reservations r
        JOIN chambres c ON r.chambre_id = c.id
        ORDER BY r.created_at DESC";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
?>

<div class="admin-card">
    <h3><?php echo $row['nom_client']; ?></h3>

    <span class="badge badge-email">📧 <?php echo $row['email']; ?></span><br>
    <span class="badge badge-poste">🛏️ <?php echo $row['chambre_nom']; ?></span><br>
    <span class="badge badge-date">📅 Du <?php echo $row['date_arrivee']; ?> au <?php echo $row['date_depart']; ?></span><br>
    <span class="badge badge-paid">📋 <?php echo $row['statut']; ?></span>

    <div class="admin-actions">
        <a href="supprimer_reservation.php?id=<?php echo $row['id']; ?>">
            <button class="btn btn-delete">Annuler / Supprimer</button>
        </a>
    </div>
</div>

<?php } ?>

</div>
</div>

</body>
</html>
