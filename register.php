<?php
session_start();
include "config/db.php";

if (isset($_POST['register'])) {
    $user = $_POST['username'];
    $pass = md5($_POST['password']);

    // On vérifie si l'utilisateur existe déjà
    $check = $conn->query("SELECT * FROM users WHERE username='$user'");
    if ($check->num_rows > 0) {
        $error = "Ce nom d'utilisateur est déjà pris.";
    } else {
        $sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";
        if ($conn->query($sql)) {
            $_SESSION['user'] = $user;
            $_SESSION['role'] = 'admin';
            $_SESSION['name'] = $user;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Erreur lors de l'inscription.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription - Hotel Booking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include("includes/navbar.php"); ?>

<div class="admin-container">

<h2 class="admin-title" style="text-align:center;">Créer un compte</h2>

<?php if(isset($error)): ?>
    <div style="color:red; text-align:center; margin-bottom:15px;"><?php echo $error; ?></div>
<?php endif; ?>

<form method="POST" style="margin:auto;">
    <input name="username" placeholder="Nom d'utilisateur" required><br>
    <input name="password" type="password" placeholder="Mot de passe" required><br>
    <button name="register" class="btn-add">S'inscrire</button>
</form>

<p style="text-align:center; margin-top:15px;">
    Déjà un compte ? <a href="login.php">Connectez-vous ici</a>
</p>

</div>

</body>
</html>
