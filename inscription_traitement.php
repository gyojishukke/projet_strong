<?php

if(isset($_SESSION['erreur']['login']))
{
    $_SESSION['erreur']['login'] =array();
}
$erreur =false;
require_once 'modele/model.php';

	if(!empty($_POST['nom']) && (!empty($_POST['prenom'])) && (!empty($_POST['email'])) && (!empty($_POST['password'])) &&  (!empty($_POST['passwordConfirm'])))
	{
		$email  = strip_tags(trim($_POST['email']));
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		// Validate e-mail
		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
		{
			$_SESSION['erreur']['login']= "Votre email n'est pas correct";
			$erreur =true;
		}

		// on verifie les passwords
		if (strip_tags(trim($_POST['password'])) !== strip_tags(trim($_POST['passwordConfirm'])))
		{
			$_SESSION['erreur']['login']= "vos mots de passe sont différents";
			$erreur =true;
		}
		// on vérifie si l'email existe dans la table utilisateur
		// false  -> donc il n'existe pas
	
		
		$emailExist = get_email_by_email($email);
		if($emailExist)
		{
			
			$_SESSION['erreur']['login'] = "cet email existe déjà";
			$erreur =true;
		}
		
		// si aucune erreur
		if(!$erreur)
		{

		
			// ajout à la BDD du nouveau Pseudo
           	$nom    = strip_tags(trim($_POST['nom']));
 			$prenom = strip_tags(trim($_POST['prenom']));
        	$mdp_hache = password_hash(strip_tags(trim($_POST['password'])),PASSWORD_DEFAULT);
			$id = new_user($nom, $prenom, $email, $mdp_hache,true);
			// on recupere l'ID du dernier enregistrement

			if($id!=="")
			{
				$id = intval($id);
				$_SESSION['user']['id'] = $id;
				$_SESSION['user']['email'] = $email;
				
				if(isset($_SESSION['user']['roles']))
				{
					$_SESSION['erreur']['roles'] =array();
				}
				// on cherche tous les roles de l'utilisateur 
				$roles=(get_roles_by_id($id));
		
				if(!empty($roles))
				{
				   	foreach ($roles as $role)
			    	{
			    		$_SESSION['user']['roles'][]= $role['libelle'];
		    		}	
	    		}

				header('Location: /index.php/login');
		 	} 
		 	else
		 	{
		 		$_SESSION['erreur']['inscription'] = "une erreur s'est produite à l'enregistrement de votre compte";
				$erreur =true; 
				header('Location: /index.php/inscription');
			}
		}
		
		header('Location: /index.php/inscription');
	}
	else
	{
		$_SESSION['erreur']['inscription'] = "Tous les champs doivent etre renseignés !";
		header('Location: /index.php/inscription');
	}
	

?>
