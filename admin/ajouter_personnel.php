<?php include("../config/db.php");

if($_POST){
    $password = md5($_POST['password']);
    $conn->query("INSERT INTO personnel (nom, username, password, poste, telephone, salaire, date_embauche)
                  VALUES ('$_POST[nom]', '$_POST[username]', '$password', '$_POST[poste]','$_POST[tel]','$_POST[salaire]','$_POST[date_embauche]')");
    header("Location: personnel.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Personnel - Hotel Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php include("../includes/navbar.php"); ?>

<div class="admin-container">

<h2 class="admin-title">Ajouter un personnel</h2>

<form method="POST">
    <input type="text" name="nom" placeholder="Nom complet" required>
    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <input type="text" name="poste" placeholder="Poste" required>
    <input type="text" name="tel" placeholder="Téléphone">
    <input type="number" name="salaire" placeholder="Salaire (DH)" step="0.01">
    <input type="date" name="date_embauche">
    <button class="btn-add">Ajouter</button>
</form>

</div>

</body>
</html>
