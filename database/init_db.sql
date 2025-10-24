-- Création de la base de données
CREATE DATABASE IF NOT EXISTS gestion_ecole;
USE gestion_ecole;

-- Table Étudiant
CREATE TABLE IF NOT EXISTS Etudiant (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150),
    sexe ENUM('M','F') DEFAULT 'M',
    filiere VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table Professeur
CREATE TABLE IF NOT EXISTS Prof (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150),
    langues VARCHAR(255),
    specialite VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Quelques données de test
INSERT INTO Etudiant (code, nom, prenom, email, sexe, filiere)
VALUES 
('E001','Ahmed','Ali','ahmed.ali@mail.com','M','Informatique'),
('E002','Sara','Ben','sara.ben@mail.com','F','Mathématiques');

INSERT INTO Prof (code, nom, prenom, email, langues, specialite)
VALUES 
('P001','Driss','Hassan','driss.hassan@mail.com','Français,Anglais','Informatique'),
('P002','Fatima','Zahra','fatima.zahra@mail.com','Anglais,Espagnol','Mathématiques');
