-- Mise à jour de la table personnel pour l'authentification
ALTER TABLE personnel ADD COLUMN username VARCHAR(50) UNIQUE AFTER nom;
ALTER TABLE personnel ADD COLUMN password VARCHAR(255) AFTER username;
