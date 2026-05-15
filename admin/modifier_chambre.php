<?php
include("../config/db.php");

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM chambres WHERE id=$id")->fetch_assoc();

if($_POST){
    $image = $data['image'];
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../images/".$image);
    }
    $conn->query("UPDATE chambres SET 
        nom='".$_POST['nom']."',
        prix='".$_POST['prix']."',
        description='".$_POST['desc']."',
        image='$image'
        WHERE id=$id");
    
    $redirect = isset($_POST['redirect']) ? $_POST['redirect'] : '../chambres.php';
    header("Location: $redirect");
    exit;
}

$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../chambres.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Chambre - Hotel Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php include("../includes/navbar.php"); ?>

<div class="admin-container">

<h2 class="admin-title">Modifier la chambre</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="redirect" value="<?php echo $referer; ?>">
    <input type="text" name="nom" value="<?php echo $data['nom']; ?>" placeholder="Nom" required>
    <input type="number" name="prix" value="<?php echo $data['prix']; ?>" placeholder="Prix" step="0.01" required>
    <textarea name="desc" placeholder="Description"><?php echo $data['description']; ?></textarea>
    <?php if(!empty($data['image'])): ?>
    <p><img src="../images/<?php echo $data['image']; ?>" style="width:100px; height:60px; object-fit:cover; border-radius:5px;"></p>
    <?php endif; ?>
    <input type="file" name="image" accept="image/*">
    <button class="btn">Modifier</button>
</form>

</div>

</body>
</html>