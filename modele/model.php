<?php

function open_database_connection()
{
	
	
	try{
		$dbh = new PDO('mysql:host=localhost;dbname=strong;charset=utf8','root','');
		// Meilleur mode pour la gestion des erreurs : (pas chercher à comprendre)
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
		//voir http://php.net/manual/fr/pdo.setattribute.php
	}catch(PDOException $e) 
	{
		// code pour gérer/afficher l'erreur
		print "Erreur !: " . $e->getMessage() . "<br>";
		die();
	}

	return $dbh;
}

function close_database_connection($dbh) {
	$dbh = null;
}

function get_email_by_email($email)
{
	$dbh = open_database_connection();
	$stmt = $dbh->prepare("SELECT * FROM utilisateurs WHERE email like :email ");
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
	close_database_connection($dbh);
	return $resultat;
}



function get_roles_by_id($id)
{
	$dbh = open_database_connection();
	$id   = intval($id);
	$stmt = $dbh->prepare("SELECT utilisateur_id, role_id, libelle FROM utilisateurs_roles INNER JOIN roles ON (role_id = id ) WHERE utilisateur_id =  :id");
	$stmt->bindValue(':id', $id , PDO::PARAM_STR);
	$roles = $stmt->fetchall(PDO::FETCH_ASSOC);
	close_database_connection($dbh);
	return $roles;
}

function new_user($nom, $prenom, $email, $password)
{
	$dbh = open_database_connection();
	$stmt = $dbh->prepare(" INSERT INTO utilisateurs(nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)");
	$stmt->bindValue(':nom',      $nom, PDO::PARAM_STR);
	$stmt->bindValue(':prenom',   $prenom,PDO::PARAM_STR);
	$stmt->bindValue(':email', 	  $email,PDO::PARAM_STR);
	$stmt->bindValue(':password', $password,PDO::PARAM_STR);
	$result = $stmt->execute();
	$lastId = $dbh->lastInsertId();
	close_database_connection($dbh);
	return $lastId;
}

function update_password($id, $password)
{
$dbh = open_database_connection();

	$stmt = $dbh->prepare("UPDATE utilisateurs set password = :mdp where id = :id ") or die(print_r ($dbh -> errorInfo ()));
    $stmt->bindValue(':id',  $_POST['id'], PDO::PARAM_STR);
    $stmt->bindValue(':mdp', $password, PDO::PARAM_STR);
	$result = $stmt->execute();
	close_database_connection($dbh);
	return $result;
}


		// ****************************************
		// Gestion du token
		// ****************************************

//  new token

function new_token($id_utilisateur, $token, $date_validite)
{
	$dbh = open_database_connection();
	$stmt = $dbh->prepare(" INSERT INTO tokens(id_utilisateur, token, date_validite) VALUES (:id , :token, :date_validite)");
	$stmt->bindValue(':id', 			 $id);
	$stmt->bindValue(':token',     		 $token, PDO::PARAM_STR);
	$stmt->bindValue(':date_validite',   date("Y-m-d H:i:s" , strtotime('+1 day')) ,PDO::PARAM_STR);
	$result = $stmt->execute();
	close_database_connection($dbh);
	return $result;	
}

//  supprimer un token

		
function delete_token($id_utilisateur)
{
		$dbh = open_database_connection();
		$stmt = $dbh->prepare(" DELETE FROM tokens where id_utilisateur = :id ") or die(print_r ($dbh -> errorInfo ()));
		$stmt->bindValue(':id',    $_POST['id'],    PDO::PARAM_STR);
		$$result = $stmt->execute();
	close_database_connection($dbh);
	return $result;	
}
