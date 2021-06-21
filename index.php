<?php
require_once('connect.php');


$articles = findAllArticles();


$pageTitle = "Accueil";
ob_start();
require('templates/articles/index.html.php');
$pageContent = ob_get_clean();

require('templates/layout.html.php');
