-- =========================================
-- CREATION DE LA BASE DE DONNEES DJITRAK
-- =========================================
CREATE DATABASE djitrak;
USE djitrak;

-- =========================================
-- TABLE UTILISATEUR
-- =========================================

CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    motDePasse VARCHAR(255) NOT NULL,
    telephone VARCHAR(20),
    dateInscription DATE
);

-- =========================================
-- TABLE ABONNE
-- =========================================

CREATE TABLE abonne (
    id INT AUTO_INCREMENT PRIMARY KEY,
    adresse VARCHAR(255),
    utilisateur_id INT UNIQUE,

    FOREIGN KEY (utilisateur_id)
    REFERENCES utilisateur(id)
);

-- =========================================
-- TABLE AGENT DE GESTION
-- =========================================

CREATE TABLE agent_gestion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employeId VARCHAR(50),
    utilisateur_id INT UNIQUE,

    FOREIGN KEY (utilisateur_id)
    REFERENCES utilisateur(id)
);

-- =========================================
-- TABLE ADMINISTRATEUR
-- =========================================

CREATE TABLE administrateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    niveau VARCHAR(50),
    utilisateur_id INT UNIQUE,

    FOREIGN KEY (utilisateur_id)
    REFERENCES utilisateur(id)
);

-- =========================================
-- TABLE PROFIL CONSOMMATION
-- =========================================

CREATE TABLE profil_conso (
    id INT AUTO_INCREMENT PRIMARY KEY,
    typeTarif VARCHAR(50),
    seuilAlerte FLOAT,
    dateMaj DATE
);

-- =========================================
-- TABLE ABONNEMENT
-- =========================================

CREATE TABLE abonnement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numeroAbonnement VARCHAR(50) UNIQUE,
    dateDebut DATE,
    statut ENUM('ACTIF','SUSPENDU','RESILIE'),
    abonne_id INT,

    FOREIGN KEY (abonne_id)
    REFERENCES abonne(id)
);

-- =========================================
-- TABLE CONSOMMATION
-- =========================================

CREATE TABLE consommation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    periodeDebut DATE,
    periodeFin DATE,
    consommationTotale FLOAT,
    montantEstime FLOAT,
    abonne_id INT,

    FOREIGN KEY (abonne_id)
    REFERENCES abonne(id)
);

-- =========================================
-- TABLE RELEVE COMPTEUR
-- =========================================

CREATE TABLE releve_compteur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dateReleve DATE,
    ancienneValeur FLOAT,
    nouvelleValeur FLOAT,
    consommation FLOAT,
    compteurId VARCHAR(50),
    abonne_id INT,

    FOREIGN KEY (abonne_id)
    REFERENCES abonne(id)
);

-- =========================================
-- TABLE FACTURE
-- =========================================

CREATE TABLE facture (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero VARCHAR(50) UNIQUE,
    dateEmission DATE,
    periodeDebut DATE,
    periodeFin DATE,
    montantTotal FLOAT,

    statut ENUM(
        'EMIS',
        'PAYEE',
        'PARTIELLEMENT_PAYEE',
        'EN_RETARD',
        'ANNULEE'
    ),

    abonne_id INT,

    FOREIGN KEY (abonne_id)
    REFERENCES abonne(id)
);

-- =========================================
-- TABLE RECLAMATION
-- =========================================

CREATE TABLE reclamation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dateDepot DATE,
    objet VARCHAR(255),
    description TEXT,

    statut ENUM(
        'EN_ATTENTE',
        'EN_COURS',
        'RESOLUE',
        'REJETEE'
    ),

    dateResolution DATE,
    abonne_id INT,

    FOREIGN KEY (abonne_id)
    REFERENCES abonne(id)
);

-- =========================================
-- TABLE PAIEMENT
-- =========================================

CREATE TABLE paiement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    datePaiement DATE,
    montant FLOAT,
    referencePaiement VARCHAR(100),

    mode ENUM(
        'ORANGE_MONEY',
        'MOOV_MONEY'
    ),

    statut ENUM(
        'EN_ATTENTE',
        'REUSSI',
        'ECHOUE',
        'ANNULE'
    ),

    facture_id INT,

    FOREIGN KEY (facture_id)
    REFERENCES facture(id)
);

-- =========================================
-- TABLE RAPPORT
-- =========================================

CREATE TABLE rapport (
    id INT AUTO_INCREMENT PRIMARY KEY,

    type ENUM(
        'CONSOMMATION',
        'RECLAMATIONS',
        'PAIEMENTS',
        'ABONNEMENTS'
    ),

    dateGeneration DATE,
    fichier VARCHAR(255)
);

-- =========================================
-- DONNEES DE TEST
-- =========================================

INSERT INTO utilisateur
(nom,email,motDePasse,telephone,dateInscription)
VALUES
(
'Moussa Traore',
'moussa@gmail.com',
'123456',
'2230123456',
CURDATE()
);

INSERT INTO abonne
(adresse, utilisateur_id)
VALUES
('Bamako, Mali',1);

INSERT INTO facture
(numero,dateEmission,periodeDebut,periodeFin,montantTotal,statut,abonne_id)
VALUES
(
'FAC-2025-001',
CURDATE(),
'2025-01-01',
'2025-01-31',
12500,
'EMIS',
1
);

INSERT INTO paiement
(datePaiement,montant,referencePaiement,mode,statut,facture_id)
VALUES
(
CURDATE(),
12500,
'OM123456',
'ORANGE_MONEY',
'REUSSI',
1
);