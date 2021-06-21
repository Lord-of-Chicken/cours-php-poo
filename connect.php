<?php
function getPdo()
{
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $pdo;
    } catch (PDOException $e) {
        echo 'Échec lors de la connexion : ' . $e->getMessage();
    }
}

function findAllArticles(): array
{
    $pdo = getPdo();
    $resultats = $pdo->prepare('SELECT * FROM articles ORDER BY created_at DESC');
    $resultats->execute();
    $articles = $resultats->fetchAll();
    return $articles;
}


function findArticle(int $id): array
{
    $pdo = getPdo();
    $query = $pdo->prepare("SELECT * FROM articles WHERE id = :article_id");
    $query->execute(['article_id' => $id]);
    $article = $query->fetch();
    return $article;
}

function finAllComments(int $article_id) : array{
    $pdo = getPdo();

$query = $pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
$query->execute(['article_id' => $article_id]);
$commentaires = $query->fetchAll();
return $commentaires;
}

function deleteArticle(int $id): void {
    $pdo = getPdo();
$query = $pdo->prepare('DELETE FROM articles WHERE id = :id');
$query->execute(['id' => $id]);

}

function findComment(int $id){
    $pdo = getPdo();

    $query = $pdo->prepare('SELECT * FROM comments WHERE id = :id');
$query->execute(['id' => $id]);
$comment = $query->fetch();
return $comment;
}

function deleteComment(int $id) : void {
    $pdo = getPdo();
$query = $pdo->prepare('DELETE FROM comments WHERE id = :id');
$query->execute(['id' => $id]);
}