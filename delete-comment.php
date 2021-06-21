<?php
require_once('connect.php');

if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("Ho ?! Tu n'as pas précisé l'id de l'article !");
}

$id = $_GET['id'];



/**
 * 3. Vérification que l'article existe bel et bien
 */
$commentaire = findComment($id);
if ($commentaire) {
    die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
}

/**
 * 4. Réelle suppression de l'article
 */
$article_id = $commentaire['article_id'];
deleteComment($id);

/**
 * 5. Redirection vers la page d'accueil
 */
header("Location: index.php");
exit();
