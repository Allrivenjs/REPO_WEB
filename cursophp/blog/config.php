<?php

$dbHost = 'localhost';
$dbName = 'cursophp';
$dbUser = 'homestead';
$dbPass = 'secret';

try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'conexion exitosa';
} catch(Exception $e) {
    echo $e->getMessage();
}