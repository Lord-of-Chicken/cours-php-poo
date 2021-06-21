<?php
require_once('connect.php');
require_once('library/utils.php');

$articles = findAllArticles();


$pageTitle = "Accueil";
render('articles/index.php', compact('pageTitle', 'articles'));