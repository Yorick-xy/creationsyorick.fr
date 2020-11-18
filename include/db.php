<?php

/**
* Connexion au serveur
* $option définie l'encodage de la base de données
* $db->setAttibute modifie la façon d'afficher les erreurs, WARNING, EXCEPTION,BOTH ou en silent
**/

/**
* Création de la db en automatique
*
CREATE TABLE `creationsyorick.fr`.`user` ( `id` INT NULL AUTO_INCREMENT , `username` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `avatar` TEXT NOT NULL , `role` VARCHAR(255) NOT NULL , `active` INT NOT NULL , `date_inscription` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , UNIQUE (`Id`)) ENGINE = MyISAM;
**/

define('DB_HOST', 'creationsyorick.fr');
define('DB_NAME', 'creat1451171');
define('DB_LOGIN', 'creat1451171');
define('DB_PASSWORD', 'fvgbffhvbc');

/**dns nécessaire pour PDO (mysql)**/
define('DNS_MYSQL', 'mysql:host='.DB_HOST.';dbname='.DB_NAME);


/**Connexion à la db**/
try{
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    
    $db = new PDO(DNS_MYSQL,DB_LOGIN,DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOExeption $e){
    echo 'Connexion à la base de données impossible : ', $e->getMessage();
    die();
}
?>