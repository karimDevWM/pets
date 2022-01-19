<!-- La page doit se nommer obligatoirement index.php, c'est ce nom que cherche le serveur pour lancer le projet -->

<?php
// appel de la page header avec require qui renvera une erreur si header n'est pas chargée
// include et require font un copier/coller du contenu de la page appelé
require_once("partials/header.php");

switch($page){
    case "Animaux":
        include_once 'animaux.php';
        break;
    case "Contact":
        include_once 'contact.php';
        break;
    case "Login":
        include_once 'login.php';
        break;
    case "Animal":
        include_once 'animal.php';
        break;
    case "Ajout_animal":
        include 'ajout-animal.php';
        break;
    case "inscription":
        include_once 'inscription.php';
        break;
    case "profil":
        include_once 'profil.php';
        break;
    case "mesanimaux":
        include_once 'mesanimaux.php';
        break;
    case "refuge":
        include_once 'refuge.php';
        break;
    case "myrefuge":
        include_once 'refuge_page.php';
        break;
    case "adopt":
        include_once 'adopt.php';
        break;
    case "Accueil":
    default:
        include_once 'accueil.php';
        break;
}
//même principe que pour header
require_once("partials/footer.php");

?>