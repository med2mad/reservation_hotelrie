<?php
session_start();
include "config/db.php";

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = md5($_POST['password']);

    // Check in users table
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user'] = $user;
        $_SESSION['role'] = 'admin';
        $_SESSION['name'] = $user;
        header("Location: dashboard.php");
        exit;
    } 
    
    // Check in personnel table
    $sql_personnel = "SELECT * FROM personnel WHERE username='$user' AND password='$pass'";
    $result_p = $conn->query($sql_personnel);
    
    if ($result_p->num_rows > 0) {
        $row_p = $result_p->fetch_assoc();
        $_SESSION['user'] = $user;
        $_SESSION['role'] = 'personnel';
        $_SESSION['name'] = $row_p['nom'];
        $_SESSION['poste'] = $row_p['poste'];
        header("Location: dashboard.php");
        exit;
    }

    echo "<div style='color:red; text-align:center; margin-top:10px;'>Nom d'utilisateur ou mot de passe incorrect</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Hotel Booking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include("includes/navbar.php"); ?>

<div class="admin-container">

<h2 class="admin-title" style="text-align:center;">Connexion</h2>

<form method="POST" style="margin:auto;">
    <input name="username" placeholder="Username"><br>
    <input name="password" type="password" placeholder="Mot de passe"><br>
    <button name="login" class="btn-add">Login</button>
</form>

</div>

</body>
</html>