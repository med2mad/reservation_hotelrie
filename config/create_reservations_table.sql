-- Création de la table reservations
CREATE TABLE IF NOT EXISTS reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_client VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    date_arrivee DATE NOT NULL,
    date_depart DATE NOT NULL,
    chambre_id INT NOT NULL,
    statut VARCHAR(20) DEFAULT 'Confirmée',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (chambre_id) REFERENCES chambres(id)
);
