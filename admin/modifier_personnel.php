<?php include("../config/db.php");

$id = $_GET['id'];
$res = $conn->query("SELECT * FROM personnel WHERE id=$id");
$data = $res->fetch_assoc();

if($_POST){
    $password_update = "";
    if(!empty($_POST['password'])) {
        $pass = md5($_POST['password']);
        $password_update = ", password='$pass'";
    }

    $conn->query("UPDATE personnel SET 
        nom='$_POST[nom]',
        username='$_POST[username]',
        poste='$_POST[poste]',
        telephone='$_POST[tel]',
        salaire='$_POST[salaire]',
        date_embauche='$_POST[date_embauche]'
        $password_update
        WHERE id=$id");
    header("Location: personnel.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Personnel - Hotel Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php include("../includes/navbar.php"); ?>

<div class="admin-container">

<h2 class="admin-title">Modifier le personnel</h2>

<form method="POST">
    <input type="text" name="nom" value="<?php echo $data['nom']; ?>" placeholder="Nom" required>
    <input type="text" name="username" value="<?php echo $data['username']; ?>" placeholder="Nom d'utilisateur" required>
    <input type="password" name="password" placeholder="Nouveau mot de passe (laisser vide pour ne pas changer)">
    <input type="text" name="poste" value="<?php echo $data['poste']; ?>" placeholder="Poste" required>
    <input type="text" name="tel" value="<?php echo $data['telephone']; ?>" placeholder="Téléphone">
    <input type="number" name="salaire" value="<?php echo $data['salaire']; ?>" placeholder="Salaire" step="0.01">
    <input type="date" name="date_embauche" value="<?php echo $data['date_embauche']; ?>">
    <button class="btn">Modifier</button>
</form>

</div>

</body>
</html>
