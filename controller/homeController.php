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

//var_dump($articles);

// pour récupérer la photo de profil

$valeurDefaut = 1;

$sql="SELECT * FROM photo WHERE defaut=:newdefaut";
$requete = $connexion -> prepare($sql);
$requete ->bindValue(":newdefaut", $valeurDefaut, PDO::PARAM_INT);
$requete -> execute();
$defautPic=$requete->fetch();

//var_dump($defautPic);

// pour définir une nouvelle photo de profil

$replacePic = false;

if (!empty($_GET["setNewPic"])) {

    $sql="UPDATE photo SET defaut=false WHERE defaut=true ";
    $requete = $connexion -> prepare($sql);
    $requete -> execute();

    $setNewPicId= $_GET["setNewPic"];
    $value=true;

    $sql="UPDATE photo SET defaut=:newValue WHERE id=:newPic ";
    $requete = $connexion -> prepare($sql);
    $requete ->bindValue(":newValue", $value);
    $requete ->bindValue(":newPic", $setNewPicId);
    $requete -> execute();

    $_SESSION["messageFlash"]="Bravo, vous avez modifié votre photo de Profil !";
    header("Location:?page=home");
    die();

}