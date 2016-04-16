<?php

$flag = false ;

if(isset($_POST['valider']))
{

	$mdp      = htmlentities(strip_tags(trim($_POST['mdp'])));
	$mdpConf  = htmlentities(strip_tags(trim($_POST['mdpConf'])));

	
	if(empty($_POST['mdp']) || (empty($_POST['mdpConf'])) )
    {

		$_SESSION['erreur'] = "Renseigner tous les champs";
	}
	elseif($mdp !== $mdpConf)
	{
		$_SESSION['erreur'] = "Vos mots de passe sont différents";
	}	
	else
	{
		
		// ****************************************
		// mise à jour du mot de passe dans la table utilisateurs
		// ****************************************
			
		$password = password_hash(htmlspecialchars(trim($_POST['mdp'])),PASSWORD_DEFAULT);
		$stmt = $dbh->prepare("UPDATE utilisateurs set password = :mdp where id = :id ") or die(print_r ($dbh -> errorInfo ()));
	    $stmt->bindValue(':id',  $_POST['id'], PDO::PARAM_STR);
	    $stmt->bindValue(':mdp', $password, PDO::PARAM_STR);
		$stmt->execute();
		$resultat = $stmt->fetch(PDO::FETCH_ASSOC);

		// ****************************************
		// suppression
		// ****************************************


		$stmt = $dbh->prepare(" DELETE FROM tokens where id_utilisateur = :id ") or die(print_r ($dbh -> errorInfo ()));
		$stmt->bindValue(':id',    $_POST['id'],    PDO::PARAM_STR);
		$stmt->execute();
		$_SESSION['erreur'] = "Votre mot de passe a été changé avec succès";

		header('Location: login.php');
	}

}
		
// ****************************************
// test d du token
// ****************************************
$id    = $_GET['id'];
$token = $_GET['token'];

$stmt = $dbh->prepare("SELECT *  FROM tokens WHERE id_utilisateur= :id and token= :token and date_validite > now()");
$stmt->bindValue(':id',    $id,    PDO::PARAM_STR);
$stmt->bindValue(':token', $token, PDO::PARAM_STR);

$stmt->execute();
$token = $stmt->fetchall(PDO::FETCH_ASSOC);
if($token)
{
	$flag = true ;
}
	

?>

