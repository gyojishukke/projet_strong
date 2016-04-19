<?php


if(isset($_SESSION['erreur']['login']))
{
    $_SESSION['erreur']['login'] =array();
}

if(isset($_POST['valider']) && isset($_POST['id']))
{

	
	if(empty($_POST['password']) || (empty($_POST['passwordConfirm'])) )
    {

		$_SESSION['erreur']['login']= "Tous les champs doivent être renseigner";
	}
	elseif($_POST['password'] !== $_POST['passwordConfirm'])
	{
		$_SESSION['erreur']['login']= "Vos mots de passe sont différents";
	}	
	else
	{
		// ****************************************
		// mise à jour du mot de passe dans la table utilisateurs
		// ****************************************
		$id = intval($_POST['id']);
		$password = password_hash(htmlspecialchars(trim($_POST['password'])),PASSWORD_DEFAULT);
		$resultat= update_password($id, $password, true);
		if($resultat)
		{

		// ****************************************
		// suppression du token
		// ****************************************

			delete_token($id);
			$_SESSION['erreur'] = "Votre mot de passe a été changé avec succès";
			header('Location: /index.php');
		}
	}

}
