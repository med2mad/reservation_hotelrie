<?php include("../config/db.php");

if($_POST){
    $conn->query("INSERT INTO factures (client_id, montant, date_facture, statut)
                  VALUES ('$_POST[client_id]','$_POST[montant]','$_POST[date_facture]','$_POST[statut]')");
    header("Location: factures.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Facture - Hotel Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php include("../includes/navbar.php"); ?>

<div class="admin-container">

<h2 class="admin-title">Ajouter une facture</h2>

<form method="POST">
    Client:
    <select name="client_id" required>
        <?php
        $clients = $conn->query("SELECT * FROM clients");
        while($c = $clients->fetch_assoc()){
            echo "<option value='".$c['id']."'>".$c['nom']."</option>";
        }
        ?>
    </select>

    <input type="number" name="montant" placeholder="Montant (DH)" step="0.01" required>
    <input type="date" name="date_facture" required>
    
    Statut:
    <select name="statut">
        <option value="En attente">En attente</option>
        <option value="Payée">Payée</option>
        <option value="Annulée">Annulée</option>
    </select>

    <button class="btn-add">Ajouter</button>
</form>

</div>

</body>
</html>
