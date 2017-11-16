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


/**********
pour définir une nouvelle photo de profil
 ***************************/



if (!empty($_GET["setNewPic"])) {

    $sql="UPDATE photo SET defaut=false WHERE defaut=true ";
    $requete = $connexion -> prepare($sql);
    $requete -> execute();

    $setNewPicId= $_GET["setNewPic"];
    $value=true;

    $sql="UPDATE photo SET defaut=:newValue WHERE id=:newPic ";
    $requete = $connexion -> prepare($sql);
    $requete ->bindValue(":newValue", $value, PDO::PARAM_INT);
    $requete ->bindValue(":newPic", $setNewPicId, PDO::PARAM_INT);
    $requete -> execute();

    $_SESSION["messageFlash"]="Bravo, vous avez modifié votre photo de Profil !";
    header("Location:?page=home");
    die();

};

/**********
pour ajouter une nouvelle photo
 ***************************/

if (!empty($_POST)) {
    $errors = [];
    var_dump($errors);
    if (empty($_FILES['image']) || $_FILES['image']['error'] != 0) {
        $errors['titre'] = "Veuillez choisir une image";
    } else {
        // Vérifier si l'utilisateur m'envoit réellement une image
        $extensions_valides = ['jpg', 'jpeg', 'gif', 'png'];
        $extension_upload = str_replace("image/", "", $_FILES['image']['type']);
        if (!in_array($extension_upload, $extensions_valides)) {
            $errors['image'] = "Image non valide";
        }

    };

    //var_dump($_POST);

    if (empty($errors)) {
        // INSERT INTO

        $defautPic = $_POST["defautPic"];

        echo "je suis dans la boucle pas d'erreur";
        if ("oui" == $defautPic) {
            $defaut=true;
            //remettre l'actuel photo de profil en photo 'normale'
            $sql="UPDATE photo SET defaut=false WHERE defaut=true ";
            $requete = $connexion -> prepare($sql);
            $requete -> execute();

        }
        else {
            $defaut=false;
        };

        if (!empty($_POST["titre"])) {
            $titre = $_POST["titre"];
        }
        else  {
            $titre="";
        }

        if (!empty($_POST["description"])) {
            $description = $_POST["description"];
        }
        else  {
            $description="";
        }
        $nomImage = uniqid().'-'.$_FILES['image']['name'];
        // Ne pas reprendre le nom de l'image
        // $nomImage = uniqid().'.'.extension_upload;
        // Mettre le titre de l'article dans le nom de l'image
        // $nomImage = str_replace(' ', '-', $_POST['titre']).'-'.uniqid().'.'.extension_upload;


        $successUpload = move_uploaded_file($_FILES['image']['tmp_name'], 'view/img/'.$nomImage);


        if ($successUpload == true) {
            var_dump($successUpload);

            $sql="INSERT INTO photo(nom, titre, description, defaut) VALUES (:newnom, :newtitre, :newdescription, :newdefaut)";
            $requete = $connexion -> prepare($sql);
            $requete ->bindValue(":newnom", $nomImage, PDO::PARAM_INT);
            $requete ->bindValue(":newtitre", $titre, PDO::PARAM_INT);
            $requete ->bindValue(":newdescription", $description, PDO::PARAM_INT);
            $requete ->bindValue(":newdefaut", $defaut, PDO::PARAM_INT);
            $requete -> execute();

            $_SESSION["messageFlash"]="Bravo, vous avez ajouté votre photo !";
            header("Location:?page=home");
            die();

        }
        else {
            $errors['image'] = "Problème lors de l'upload de l'image";
        }

    }
    else {
        foreach ($errors as $key => $value) {
            echo $value."<br/>";
        }
    };

};




