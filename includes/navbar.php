<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Détection du chemin de base pour les liens
$current_dir = basename(dirname($_SERVER['PHP_SELF']));
$prefix = ($current_dir == 'admin') ? '../' : '';
?>

<header>
    <div class="logo">HotelBooking</div>
    <nav>
        <a href="<?php echo $prefix; ?>index.php">Accueil</a>
        <a href="<?php echo $prefix; ?>chambres.php">Chambres</a>
        
        <?php if(isset($_SESSION['user'])): ?>
            <!-- Liens Admin/Personnel -->
            <a href="<?php echo $prefix; ?>admin/clients.php">Clients</a>
            <a href="<?php echo $prefix; ?>admin/personnel.php">Personnel</a>
            <a href="<?php echo $prefix; ?>admin/reservations.php">Réservations</a>
            <a href="<?php echo $prefix; ?>admin/factures.php">Factures</a>
            <a href="<?php echo $prefix; ?>dashboard.php">Dashboard</a>
            <a href="<?php echo $prefix; ?>logout.php" style="color:#ff4d4d;">Déconnexion</a>
        <?php else: ?>
            <a href="<?php echo $prefix; ?>login.php">Connexion</a>
            <a href="<?php echo $prefix; ?>register.php">Inscription</a>
        <?php endif; ?>
    </nav>
</header>
