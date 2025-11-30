CREATE DATABASE IF NOT EXISTS gestionstock_v2 CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE gestionstock_v2;

CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','vendeur') DEFAULT 'vendeur'
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

CREATE TABLE fournisseurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    telephone VARCHAR(30),
    adresse TEXT
);

CREATE TABLE produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    quantite INT NOT NULL,
    prix DECIMAL(10,2) NOT NULL,
    categorie_id INT,
    fournisseur_id INT,
    FOREIGN KEY (categorie_id) REFERENCES categories(id) ON DELETE SET NULL,
    FOREIGN KEY (fournisseur_id) REFERENCES fournisseurs(id) ON DELETE SET NULL
);

CREATE TABLE mouvements_stock (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produit_id INT NOT NULL,
    type ENUM('entree','sortie') NOT NULL,
    quantite INT NOT NULL,
    date_heure DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (produit_id) REFERENCES produits(id) ON DELETE CASCADE
);

-- utilisateurs
INSERT INTO utilisateurs (username, password, role) VALUES
('admin',  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
('employe','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vendeur');

-- catégories
INSERT INTO categories (nom) VALUES
('Papeterie'), ('Informatique'), ('Mobilier'), ('Autre');

-- fournisseurs
INSERT INTO fournisseurs (nom, telephone, adresse) VALUES
('OfficePlus', '70 123 456', 'Tunis'),
('InfoTech', '71 654 321', 'Sousse');

-- produits
INSERT INTO produits (nom, quantite, prix, categorie_id, fournisseur_id) VALUES
('Stylo bleu', 150, 0.800, 1, 1),
('Cahier 100 pages', 80, 2.500, 1, 1),
('Clé USB 32GB', 45, 15.900, 2, 2),
('Souris sans fil', 20, 22.000, 2, 2),
('Chaise bureau', 7, 129.000, 3, 1);