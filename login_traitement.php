<?php

$erreur =false;
require_once 'modele/model.php';

	if(isset($_POST['email']) && isset($_POST['password']))
	{
		$email  = htmlentities(strip_tags(trim($_POST['email'])));
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		// Validate e-mail
		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
		{
			$_SESSION['erreur']['login']= "Votre email n'est pas correct";
			$erreur =true;
		}
		
		// on vérifie si l'email existe dans la table utilisateur
		// si l=il exisye on retourne le mot de passe
		

		$resultat = get_email_by_email($email);
				
		if(!$resultat['email'])
		{
			$_SESSION['erreur']['login'] = "Votre email n'existe pas";
			$erreur =true;
		}
		
		// on vérifie si le mdp correspond 
		$mdp = htmlspecialchars(trim($_POST['password']));
		if(!password_verify($mdp, $resultat['password']))
		{

			$_SESSION['erreur']['login'] = "Le mot de passse est incorrect !";
			$erreur =true;
			
		}

		// si aucune erreur
		if(!$erreur)
		{
			// Le mdp correspond 
			$_SESSION['user']['id'] = $resultat['id'];
			$_SESSION['user']['email'] = $email;
			if(isset($_SESSION['erreur']['login']))
			{
				unset($_SESSION['erreur']['login']) ; 
			} 
			$id = intval($id);
		

			if(isset($_SESSION['user']['roles']))
			{
				unset($_SESSION['user']['roles']);
			}
			// on cherche tous les roles de l'utilisateur 
			if(!empty(get_roles_by_id($id)))
			{
			   	foreach ($roles as $role)
		    	{
		    		$_SESSION['user']['roles'][]= $role['libelle'];
	    		}		   		
		 	}

		 } 
		 
			
		header('Location: /index.php/login');
	}
	else
	{
		$_SESSION['erreur']['login'] = "L'email n'a pas été trouvé !";
		header('Location: /index.php/login');
	}
	

?>
