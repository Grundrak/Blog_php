<?php
$host = 'localhost';
$dbname = 'blog_php';
$username = 'root';
$password = 'Your_Password';
try {

    $Connect_DB = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $Connect_DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "
    CREATE DATABASE IF NOT EXISTS blog_php;
    USE blog_php;
    CREATE TABLE IF NOT EXISTS articles (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titre VARCHAR(255) NOT NULL,
        description TEXT,
        image VARCHAR(255),
        date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        date_modification TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS utilisateurs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        mot_de_passe VARCHAR(255) NOT NULL,
        role ENUM('admin', 'utilisateur') NOT NULL DEFAULT 'utilisateur',
        date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS commentaires (
        id INT AUTO_INCREMENT PRIMARY KEY,
        utilisateur_id INT NOT NULL,
        article_id INT NOTNULL,
        contenu TEXT NOT NULL,
        date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS likes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        utilisateur_id INT NOT NULL,
        article_id INT NOT NULL,
        date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    ";

    $Connect_DB->exec($sql);
    echo "Les tables ont été créées avec succès.";
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
