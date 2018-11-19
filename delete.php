<?php
require 'config/db.php';

//get super global
$id = $_GET['id'];

$sql = 'DELETE FROM company WHERE id = :id';

$statement = $conn->prepare($sql);

if ($statement->execute(['id' => $id])) {
    header('Location: index.php');
}

?>