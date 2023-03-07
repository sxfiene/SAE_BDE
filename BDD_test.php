<?php

$host= 'localhost';
$db = 'sae_rework';
$user = 'postgres';
$password = 'Derferferd12';

try {
	$dsn = "pgsql:host=$host;port=5433;dbname=$db;";
	// make a database connection
	$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

	if ($pdo) {
		echo "Connected to the $db database successfully!";
	}
} catch (PDOException $e) {
	die($e->getMessage());
} finally {
	if ($pdo) {
		$pdo = null;
	}
}
?>
