<?php

$article_id = null;

if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $article_id = $_GET['id']; 
}

if (!$article_id) {
    die("Vous devez préciser un paramètre `id` dans l'URL !");
}

require_once('connect.php');
require_once('library/utils.php');

$article = findArticle($article_id);
$commentaires =findAllArticles();


$pageTitle = $article['title'];
render('articles/show', compact('pageTitle', 'article', 'commentaires', 'article_id');