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

function close_database_connection($dbh)
{
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
	$stmt->bindValue(':id', $id , PDO::PARAM_INT);
	$result = $stmt->execute();
	$roles = $stmt->fetchall(PDO::FETCH_ASSOC);
	close_database_connection($dbh);
	return $roles;
}

function new_user($nom, $prenom, $email, $password, $actif )
{
	$dbh = open_database_connection();
	$stmt = $dbh->prepare(" INSERT INTO utilisateurs(nom, prenom, email, password,actif) VALUES (:nom, :prenom, :email, :password, :actif)");
	$stmt->bindValue(':nom',      $nom, PDO::PARAM_STR);
	$stmt->bindValue(':prenom',   $prenom,PDO::PARAM_STR);
	$stmt->bindValue(':email', 	  $email,PDO::PARAM_STR);
	$stmt->bindValue(':password', $password,PDO::PARAM_STR);
	$stmt->bindValue(':actif',    $password,PDO::PARAM_INT);
	$result = $stmt->execute();
	$lastId = $dbh->lastInsertId();
	close_database_connection($dbh);
	return $lastId;
}

function update_password($id, $password, $actif  )
{
$dbh = open_database_connection();

	$stmt = $dbh->prepare("UPDATE utilisateurs set password = :mdp, actif = :actif where id = :id ") or die(print_r ($dbh -> errorInfo ()));
    $stmt->bindValue(':id',  $_POST['id'], PDO::PARAM_INT);
    $stmt->bindValue(':mdp', $password, PDO::PARAM_STR);
    $stmt->bindValue(':actif', $actif, PDO::PARAM_INT );
    $resultat = $stmt->execute();
	close_database_connection($dbh);
	return $resultat;
}

// on rend le user inactif quand il valide oubli_password.php
// il  sera réactiver dans change_password
function etat_user($id, $actif )
{
	$dbh = open_database_connection();
	var_dump($id);
	var_dump($actif);
	$stmt = $dbh->prepare("UPDATE utilisateurs set actif = :actif where id = :id ") or die(print_r ($dbh -> errorInfo ()));
    $stmt->bindValue(':id',    $id ,    PDO::PARAM_INT);
    $stmt->bindValue(':actif', $actif,  PDO::PARAM_INT );
	$resultat = $stmt->execute();
	close_database_connection($dbh);
	return $resultat;
}

		// ****************************************
		// Gestion du token
		// ****************************************

function new_token($id_utilisateur, $token)
{
	$dbh = open_database_connection();
	$stmt = $dbh->prepare(" INSERT INTO tokens(id_utilisateur, token, date_validite) VALUES (:id , :token, :date_validite)");
	$stmt->bindValue(':id', 			 $id_utilisateur, PDO::PARAM_INT);
	$stmt->bindValue(':token',     		 $token, PDO::PARAM_STR);
	$stmt->bindValue(':date_validite',   date("Y-m-d H:i:s" , strtotime('+1 day')) ,PDO::PARAM_STR);
	$resultat = $stmt->execute();
	close_database_connection($dbh);
	return $resultat;	
}

//  supprimer un token

		
function delete_token($id_utilisateur)
{
	$dbh = open_database_connection();
	$stmt = $dbh->prepare(" DELETE FROM tokens where id_utilisateur = :id ") or die(print_r ($dbh -> errorInfo ()));
	$stmt->bindValue(':id',   $id_utilisateur,    PDO::PARAM_INT);
	$resultat = $stmt->execute();
	close_database_connection($dbh);
	return $resultat;	
}



// ****************************************
// on verifie le token si il est tjs valide
// ****************************************
function get_token($id_utilisateur, $token)
{

	$dbh = open_database_connection();
	$stmt = $dbh->prepare("SELECT *  FROM tokens WHERE id_utilisateur= :id and token= :token and date_validite > now()");
	$stmt->bindValue(':id',    $id_utilisateur,    PDO::PARAM_INT);
	$stmt->bindValue(':token', $token, PDO::PARAM_STR);
	$stmt->execute();
	$resultat = $stmt->fetch(PDO::FETCH_ASSOC);
	close_database_connection($dbh);
	return $resultat;
}


/***************************************************************************/
/***************************         MOMAR                       ***********/
/***************************************************************************/
function affichageActivite(){
	$dbh = open_database_connection();
	// la requête permmettant d'afficher les types d'activités dans le select
	$sql = "SELECT * FROM type_activite";
	$stmt = $dbh->query($sql);
	$activite = $stmt->fetchAll(PDO::FETCH_ASSOC);
	close_database_connection($dbh);
	return $activite;
}
function affichageEpreuve(){
	$dbh = open_database_connection();
// la requête permmettant d'afficher les types d'epreuve dans le select
	$sql = "SELECT * FROM type_epreuve";
	$stmt = $dbh->query($sql);
	$epreuve = $stmt->fetchAll(PDO::FETCH_ASSOC);
	close_database_connection($dbh);
	return $epreuve;
}
function affichageExercice(){
	$dbh = open_database_connection();
// la requête permmettant d'afficher les types d'exercice dans le select
	$sql = "SELECT * FROM type_exercice ";
	$stmt = $dbh->query($sql);
	$exercice = $stmt->fetchAll(PDO::FETCH_ASSOC);
	close_database_connection($dbh);
	return $exercice;
}
function affichageUnite(){
	$dbh = open_database_connection();
// la requête permmettant d'afficher les types d'unite dans le select
	$sql = "SELECT * FROM unite ";
	$stmt = $dbh->query($sql);
	$unit = $stmt->fetchAll(PDO::FETCH_ASSOC);
	close_database_connection($dbh);
	return $unit;
}
function carnetRegistre(){
	
	$dbh = open_database_connection();
	$stmt = $dbh->prepare("INSERT INTO carnets (utilisateur_id, type_epreuve_id, type_activite_id, type_exercice_id, valeur, unite_id, sensations, lieu, conditions, commentaires) VALUES (:utilisateur, :epreuve, :activite, :exercice, :valeur, :unite, :sensation, :lieux, :condition, :commentaire)");
	$stmt->bindValue(':utilisateur', 1,PDO::PARAM_INT);
	$stmt->bindValue(':epreuve', $epreuve,PDO::PARAM_INT);
	$stmt->bindValue(':activite', $activite,PDO::PARAM_INT);
	$stmt->bindValue(':exercice', $exercice,PDO::PARAM_INT);
	$stmt->bindValue(':valeur', $distance,PDO::PARAM_INT);
	$stmt->bindValue(':unite', $unite,PDO::PARAM_INT);
	$stmt->bindValue(':sensation', $sensation,PDO::PARAM_STR);
	$stmt->bindValue(':lieux', $lieux,PDO::PARAM_STR);
	$stmt->bindValue(':condition', $condition,PDO::PARAM_STR);
	$stmt->bindValue(':commentaire', $commentaire,PDO::PARAM_STR);
	$result = $stmt->execute();
	close_database_connection($dbh);
	return $result;
}
function afficheCarnet(){
	$dbh = open_database_connection();
	// il manque les restrictions pour chaque utilisateurs
	$sql = "SELECT * FROM carnets";
	$stmt = $dbh->query($sql);
	$carnet = $stmt->fetchAll(PDO::FETCH_ASSOC);
	close_database_connection($dbh);
	return $carnet;
}
// afin de modifier une note du carnet
function affichernote(){
	$dbh = open_database_connection();
	$sql = "SELECT * FROM carnets WHERE id ='".$_GET['id']."'"; //R.F
	$stmt = $dbh->query($sql);
	$carnet = $stmt->fetchAll(PDO::FETCH_ASSOC);
	close_database_connection($dbh);
	return $carnet;
}
function modifiernote(){
	$dbh = open_database_connection();
	$stmt = $dbh->prepare("UPDATE carnets SET type_epreuve_id= :epreuve, type_activite_id= :activite, type_exercice_id= :exercice, valeur= :valeur, unite_id= :unite, sensations= :sensation, lieu= :lieux, conditions= :condition, commentaires= :commentaire WHERE id = :ide");
	$stmt->bindValue(':ide',$_GET['id'],PDO::PARAM_INT);
	$stmt->bindValue(':epreuve',$_POST['epreuve'],PDO::PARAM_INT);
	$stmt->bindValue(':activite',$_POST['activite'],PDO::PARAM_INT);
	$stmt->bindValue(':exercice',$_POST['exercice'],PDO::PARAM_INT);
	$stmt->bindValue(':valeur',$_POST['distance'],PDO::PARAM_INT);
	$stmt->bindValue(':unite',$_POST['unite'],PDO::PARAM_INT);
	$stmt->bindValue(':sensation',$_POST['sensation'],PDO::PARAM_STR);
	$stmt->bindValue(':lieux',$_POST['lieux'],PDO::PARAM_STR);
	$stmt->bindValue(':condition',$_POST['condition'],PDO::PARAM_STR);
	$stmt->bindValue(':commentaire',$_POST['commentaire'],PDO::PARAM_STR);
	$result = $stmt->execute();
	close_database_connection($dbh);
	return $result;
}
