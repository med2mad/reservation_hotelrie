<?php 
session_start();
include("config/db.php"); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hotel Booking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include("includes/navbar.php"); ?>

<section class="hero">
    <h1>Trouvez votre séjour parfait</h1>

    <form class="search-box" method="GET" action="chambres.php">
        <input type="text" name="search" placeholder="Nom de chambre">
        <button>Rechercher</button>
    </form>
</section>

<section class="rooms">
    <h2>Chambres populaires</h2>
    <div class="cards">

<?php
$sql = "SELECT * FROM chambres LIMIT 3";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
?>
    <div class="card">
        <img style="height:230px;" src="images/<?php echo $row['image']; ?>">
        <h3><?php echo $row['nom']; ?></h3>
        <p><?php echo $row['description']; ?></p>
        <span><?php echo $row['prix']; ?> DH / nuit</span>
        <a href="reservation.php?id=<?php echo $row['id']; ?>">
            <button>Réserver</button>
        </a>
    </div>
<?php } ?>

    </div>
</section>

</body>
</html>