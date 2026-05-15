-- Tables pour Personnel et Factures
-- Exécuter ce script dans phpMyAdmin sur la base hotel_db

CREATE TABLE IF NOT EXISTS personnel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    poste VARCHAR(100) NOT NULL,
    telephone VARCHAR(20),
    salaire DECIMAL(10,2),
    date_embauche DATE
);

CREATE TABLE IF NOT EXISTS factures (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT NOT NULL,
    montant DECIMAL(10,2) NOT NULL,
    date_facture DATE,
    statut VARCHAR(20) DEFAULT 'En attente',
    FOREIGN KEY (client_id) REFERENCES clients(id)
);
