<?php
$erreur =false;
require_once 'modele/model.php';

function envoiMail($lien, $email)
{

	require 'vendor/phpmailer/PHPMailerAutoload.php';
	require_once('vendor/phpmailer/class.phpmailer.php');

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();   
	$mail->CharSet = "UTF-8";                                   // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	// $mail->SMTPDebug = 1;
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = $email;                 // SMTP username
	$mail->Password = 'Romane02';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to

	$mail->setFrom($email );
	$mail->addAddress($email);     // Add a recipient
	
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Réinitialiser votre mot de passe';
	$mail->Body    = 'Bonjour, merci de cliquer sur le lien ci-dessous pour modifier votre mot de passe \n 
					  cliquez ici : '.  $lien . ' >';
	// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';



	if(!$mail->send()) 
	{
		$_SESSION['user']['token'] = 'Message could not be sent.!!';
	}
	else
	{
	    echo 'Message has been sent';
	  	$_SESSION['user']['token'] = "Un emmail  vous a été envoyé sur votre boite aux lettres avec un lien. Merci de cliquer ce le lien pour changer votre mot de passe";
	}


}

// ***************************************************************************************************************************
// traitement de réinitialisation du mot de passe
// si l'email est correct et existe  -> envoi email un lien
//  ce clien retourne sur une page password_init.php



if(isset($_POST['valider']))
{
	if(isset($_POST['email']))
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
			
		$resultat = get_email_by_email($email);
		if(!$resultat['email'])
		{
			$_SESSION['erreur']['login'] = "Votre email n'existe pas";
			$erreur =true;
		}
	
		// si aucune erreur
		if(!$erreur)
		{

			if(isset($_SESSION['erreur']['login']))
				{
					unset($_SESSION['erreur']['login']);
				}
			$id     = intval($resultat['id']);
			$token  = md5(uniqid(rand(), true));
			



		// ****************************************
		// on désactive le compte tant que le lien  sur
		// le mail n'a pas été activé
		// ****************************************
		
		$resultat= etat_user($id, false);
	

		// insertion dans  la table tokens  : id de l’utilisateur et un token fraichement generé.
		// crée un token associé à l’ID de l’utilisateur  : $token  = md5(uniqueid(rand(); true))
		// crée un lien  : <a href =”reinit.php?id=xx=token=xx”>lien<a>
			$idToken = new_token($id, $token);
			if($idToken!=="")
			{

				// $id = id de l'utilisateur
				$lien = "<a href=\"http://www.projet_strong/index.php/change_password?&id=" . $id . "&token=" . $token . "\">Lien</a>";
				envoiMail($lien, $email);
			}
			// retour page login
			header('Location: /index.php/login');			
		}				
	}

}	