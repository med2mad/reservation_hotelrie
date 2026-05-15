<?php
include("../config/db.php");

if($_POST){
    $image = '';
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../images/".$image);
    }
    $conn->query("INSERT INTO chambres (nom, prix, description, image) 
                  VALUES ('".$_POST['nom']."','".$_POST['prix']."','".$_POST['desc']."','$image')");
    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../chambres.php';
    if(strpos($redirect, 'admin/chambres.php') !== false) {
        header("Location: chambres.php");
    } else {
        header("Location: ../chambres.php");
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Chambre - Hotel Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php include("../includes/navbar.php"); ?>

<div class="admin-container">

<h2 class="admin-title">Ajouter une chambre</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="nom" placeholder="Nom de la chambre" required>
    <input type="number" name="prix" placeholder="Prix (DH)" step="0.01" required>
    <textarea name="desc" placeholder="Description"></textarea>
    Image: <input type="file" name="image" accept="image/*">
    <button class="btn-add">Ajouter</button>
</form>

</div>

</body>
</html>
