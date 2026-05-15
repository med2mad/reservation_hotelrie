<?php
session_start();
include("config/db.php");
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// Récupération des statistiques
$nb_chambres = $conn->query("SELECT COUNT(*) as total FROM chambres")->fetch_assoc()['total'];
$nb_clients = $conn->query("SELECT COUNT(*) as total FROM clients")->fetch_assoc()['total'];
$nb_factures = $conn->query("SELECT COUNT(*) as total FROM factures")->fetch_assoc()['total'];
$nb_reservations = $conn->query("SELECT COUNT(*) as total FROM reservations")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Hotel Admin</title>
    <link rel="stylesheet" href="admin/style.css">
</head>
<body>

<?php include("includes/navbar.php"); ?>

<div class="admin-container">

<h2 class="admin-title">Dashboard</h2>
<p style="margin-bottom:20px;">Bienvenue, <strong><?php echo $_SESSION['name']; ?></strong> (<?php echo $_SESSION['role']; ?>)</p>

<div class="admin-cards">

    <div class="admin-card">
        <h3>Chambres (<?php echo $nb_chambres; ?>)</h3>
        <p>Gérer les chambres de l'hôtel</p>
        <div class="admin-actions">
            <a href="admin/chambres.php"><button class="btn btn-edit">Gérer</button></a>
        </div>
    </div>

    <div class="admin-card">
        <h3>Clients (<?php echo $nb_clients; ?>)</h3>
        <p>Gérer la liste des clients</p>
        <div class="admin-actions">
            <a href="admin/clients.php"><button class="btn btn-edit">Gérer</button></a>
        </div>
    </div>

    <div class="admin-card">
        <h3>Réservations (<?php echo $nb_reservations; ?>)</h3>
        <p>Gérer les réservations clients</p>
        <div class="admin-actions">
            <a href="admin/reservations.php"><button class="btn btn-edit">Gérer</button></a>
        </div>
    </div>

    <div class="admin-card">
        <h3>Factures (<?php echo $nb_factures; ?>)</h3>
        <p>Gérer les facturations</p>
        <div class="admin-actions">
            <a href="admin/factures.php"><button class="btn btn-edit">Gérer</button></a>
        </div>
    </div>

</div>

<div style="text-align:center; margin-top:30px;">
    <a href="logout.php" class="btn btn-delete" style="padding:10px 20px; text-decoration:none; color:white; border-radius:6px; display:inline-block;">Logout</a>
</div>

</div>

</body>
</html>