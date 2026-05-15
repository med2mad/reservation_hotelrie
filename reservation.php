<?php 
session_start();
include("config/db.php"); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Réservation - Hotel Booking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include("includes/navbar.php"); ?>

<div class="admin-container">
<form method="POST">
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="date" name="arrivee" required>
    <input type="date" name="depart" required>

    <input type="hidden" name="chambre_id" value="<?php echo $_GET['id']; ?>">

    <button type="submit">Confirmer</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $arrivee = $_POST['arrivee'];
    $depart = $_POST['depart'];
    $chambre_id = $_POST['chambre_id'];

    $sql = "INSERT INTO reservations (nom_client, email, date_arrivee, date_depart, chambre_id)
            VALUES ('$nom','$email','$arrivee','$depart','$chambre_id')";

    if ($conn->query($sql)) {
        echo "<h3>Réservation confirmée ✅</h3>";
    }
}
?>
</div>

</body>
</html>