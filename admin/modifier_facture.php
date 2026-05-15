<?php include("../config/db.php");

$id = $_GET['id'];
$res = $conn->query("SELECT * FROM factures WHERE id=$id");
$data = $res->fetch_assoc();

if($_POST){
    $conn->query("UPDATE factures SET 
        client_id='$_POST[client_id]',
        montant='$_POST[montant]',
        date_facture='$_POST[date_facture]',
        statut='$_POST[statut]'
        WHERE id=$id");
    header("Location: factures.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Facture - Hotel Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php include("../includes/navbar.php"); ?>

<div class="admin-container">

<h2 class="admin-title">Modifier la facture</h2>

<form method="POST">
    Client:
    <select name="client_id">
        <?php
        $clients = $conn->query("SELECT * FROM clients");
        while($c = $clients->fetch_assoc()){
            $selected = ($c['id'] == $data['client_id']) ? "selected" : "";
            echo "<option value='".$c['id']."' $selected>".$c['nom']."</option>";
        }
        ?>
    </select>

    <input type="number" name="montant" value="<?php echo $data['montant']; ?>" step="0.01" required>
    <input type="date" name="date_facture" value="<?php echo $data['date_facture']; ?>">
    
    Statut:
    <select name="statut">
        <option value="En attente" <?php if($data['statut']=='En attente') echo 'selected'; ?>>En attente</option>
        <option value="Payée" <?php if($data['statut']=='Payée') echo 'selected'; ?>>Payée</option>
        <option value="Annulée" <?php if($data['statut']=='Annulée') echo 'selected'; ?>>Annulée</option>
    </select>

    <button class="btn">Modifier</button>
</form>

</div>

</body>
</html>
