<?php include("../config/db.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Factures - Hotel Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php include("../includes/navbar.php"); ?>

<div class="admin-container">

<h2 class="admin-title">Gestion des factures</h2>

<a href="ajouter_facture.php" class="btn-add">+ Ajouter facture</a>

<div class="admin-cards">

<?php
$sql = "SELECT f.*, c.nom 
        FROM factures f
        JOIN clients c ON f.client_id = c.id";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    $statutClass = '';
    if($row['statut'] == 'Payée') $statutClass = 'badge-paid';
    elseif($row['statut'] == 'En attente') $statutClass = 'badge-pending';
    else $statutClass = 'badge-cancelled';
?>

<div class="admin-card">
    <h3><?php echo "Facture N°: #" . str_pad($row['id'], 5, "0", STR_PAD_LEFT); ?></h3>
    client : <span class="badge badge-money"><?php echo $row['nom']; ?> </span><br>
    montant : <span class="badge badge-money"><?php echo $row['montant']; ?> DH</span><br>
    date : <span class="badge badge-date"><?php echo $row['date_facture']; ?></span><br>
    statut :<span class="badge <?php echo $statutClass; ?>"><?php echo $row['statut']; ?></span>

    <div class="admin-actions">
        <a href="modifier_facture.php?id=<?php echo $row['id']; ?>">
            <button class="btn">Modifier</button>
        </a>
        <a href="supprimer_facture.php?id=<?php echo $row['id']; ?>">
            <button class="btn">Supprimer</button>
        </a>
    </div>
</div>

<?php } ?>

</div>
</div>

</body>
</html>
