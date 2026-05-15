<?php include("../config/db.php");

$id = $_GET['id'];
$res = $conn->query("SELECT * FROM clients WHERE id=$id");
$data = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Client - Hotel Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php include("../includes/navbar.php"); ?>

<div class="admin-container">

<h2 class="admin-title">Modifier le client</h2>

<form method="POST">
    <input type="text" name="nom" value="<?php echo $data['nom']; ?>">
    <input type="email" name="email" value="<?php echo $data['email']; ?>">
    <input type="text" name="tel" value="<?php echo $data['telephone']; ?>">
    <button class="btn">Modifier</button>
</form>

</div>

<?php
if($_POST){
    $conn->query("UPDATE clients SET 
        nom='$_POST[nom]',
        email='$_POST[email]',
        telephone='$_POST[tel]'
        WHERE id=$id");
        
    header("Location: clients.php");
}
?>

</body>
</html>