<?php
session_start();

require_once 'modele/model.php';
require_once 'controllers.php';


// "routes"
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
echo "<small>route = $uri</small><br>";



if('/index.php' === $uri)
{
	accueil();
}	

//*********************************************
// cas de Login 
//*********************************************

elseif('/index.php/login' === $uri)
{
	login();
}
// Controle du login
elseif ('/index.php/login_traitement' === $uri )
{
	login_traitement() ;
}

//*********************************************
// Inscription
//*********************************************
elseif('/index.php/inscription' === $uri)
{
	inscription();
}

elseif ('/index.php/inscription_traitement' === $uri )
{
	inscription_traitement() ;
}

//*********************************************
// oublie password - on rentre l'email
//*********************************************
elseif('/index.php/oublie_password' === $uri)
{
	oublie_password();
}

elseif ('/index.php/oublie_password_traitement' === $uri )
{
	oublie_password_traitement() ;
}

//*********************************************
// oublie password - on rentre l'email
//*********************************************

elseif ('/index.php/login_init' === $uri )
{
	login_oublie() ;
}

elseif ('/index.php/login_init_post' === $uri )
{
	login_oublie_traitement() ;
}


//*********************************************
// change password 
//*********************************************
 
elseif ('/index.php/change_password' === $uri && isset($_GET['id']) && isset($_GET['token'])) 
{
	change_password($_GET['id'],$_GET['token']) ;
}


elseif ('/index.php/change_password_traitement' === $uri )

{
	change_password_traitement() ;
}


//*********************************************

elseif ('/index.php/accesForum' === $uri & !isset($_SESSION['user']['id'])) 
{
	login();
}
elseif ('/index.php/accesCarnet' === $uri & !isset($_SESSION['user']['id']) )
{
	login();
}




//*********************************************


else {

	header('Status: 404 Not Found');
	echo '<html><body>Page non trouvée...</body></html>';
}
?>