<?php
$dsn = 'mysql:host=localhost;dbname=catalog';
$username = 'root';
$password = '';
$options = [];
try {
$pdo = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}