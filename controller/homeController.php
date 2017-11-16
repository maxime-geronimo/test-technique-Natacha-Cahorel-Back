<?php
/**
 * Created by PhpStorm.
 * User: natacha
 * Date: 15/11/2017
 * Time: 19:29
 */

/**********
AFFICHAGE
 ***************************/

// pour récupérer les données
$sql="SELECT * FROM photo ORDER BY id DESC";
$requete = $connexion -> prepare($sql);;
$requete -> execute();
$articles=$requete->fetchAll();

var_dump($articles);