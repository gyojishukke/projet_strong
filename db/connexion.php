<?php
try {
	$dbh = new PDO('mysql:host=localhost;dbname=strong;charset=utf8', 'root', '');
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // c'est le meilleur mode pour la gestion des erreurs
	$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // voir http://php.net/manual/fr/pdo.setattribute.php
} catch(PDOException $e) {
	print "Erreur : " . $e->getMessage() . "<br>";
	die();
}
