<?php   
// Make connection to the database
$pdo = new PDO('mysql:host=localhost; port=3306;dbname=products_crud2', 'root', '');
// Tell PDO if there is an error
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_POST['id'] ?? null;

if (!$id){
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: index.php');