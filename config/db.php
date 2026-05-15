<?php
$conn = new mysqli("localhost", "root", "", "hotel_db");

if ($conn->connect_error) {
    die("Erreur connexion");
}
?>