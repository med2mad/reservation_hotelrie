-- Création de la table users pour les administrateurs
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertion d'un admin par défaut si nécessaire
-- INSERT INTO users (username, password) VALUES ('admin', MD5('1234'));
