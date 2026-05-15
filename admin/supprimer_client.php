<?php include("../config/db.php");

$id = $_GET['id'];

// Supprimer les dépendances d'abord pour éviter l'erreur de clé étrangère
$conn->query("DELETE FROM paiements WHERE client_id=$id");
$conn->query("DELETE FROM factures WHERE client_id=$id");
$conn->query("DELETE FROM reservations WHERE email = (SELECT email FROM clients WHERE id=$id)"); 
// Note: reservations utilise l'email dans ma version précédente, mais s'il utilise client_id, adaptez.
// Vu que dans reservation.php on utilise le nom/email du formulaire, il n'y a pas forcément de lien direct par ID.

$conn->query("DELETE FROM clients WHERE id=$id");

header("Location: clients.php");
?>