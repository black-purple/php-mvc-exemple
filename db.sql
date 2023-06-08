-- Active: 1686250551130@@127.0.0.1@3306@exemple_mvc
CREATE DATABASE IF NOT EXISTS exemple_mvc;

USE exemple_mvc;

CREATE TABLE
    IF NOT EXISTS produits(
        identifiant int PRIMARY KEY AUTO_INCREMENT,
        libelle VARCHAR(40),
        description VARCHAR(40),
        qte int,
        prix double(5,2),
        statut ENUM(
            "En Stock",
            "Rupture de stock"
        )
    );

