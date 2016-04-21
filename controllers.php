<?php

function accueil() {
	
	require 'template/home.php';
}


//*********************************************
//  Login 
//*********************************************
function login() {
	
	require 'template/login_form.php';
}
		 
function login_traitement() 
{
	if(isset($_POST['valider']))
	{
		require 'login_traitement.php';
	}
	
	
}
//*********************************************
//  inscription 
//*********************************************

function inscription() {
	
	require 'template/inscription_form.php';
}
		 
function inscription_traitement() 
{
	if(isset($_POST['valider']))
	{
		require 'inscription_traitement.php';
	}
	
	
}
//*********************************************

//  mot cde passe oublie 
//*********************************************

function login_oublie() {
	
	require 'template/oublie_form.php';
}
		 
function login_oublie_traitement() 
{
	if(isset($_POST['valider']))
	{
		require 'login_oublie_traitement.php';
=======
//  mot de passe oublie 
//*********************************************

function oublie_password() {
	
	require 'template/oublie_password.php';
}
		 
function oublie_password_traitement() 
{
	if(isset($_POST['valider']))
	{
		require 'oublie_password_traitement.php';
	}
	
	
}
//*********************************************
//  changer son mdp
//*********************************************

function change_password($id) {
	
	require 'template/change_password.php';
}
		 
function change_password_traitement() 


{
	if(isset($_POST['valider']))
	{
		require 'change_password_traitement.php';

	}
	
	
}




//*********************************************

//*********************************************
//  Carnet momar
//*********************************************

function carnet() {
	$activite = affichageActivite();
	$epreuve =affichageEpreuve();
	$exercice = affichageExercice();
	$unit = affichageUnite();
	require 'template/carnet.php';
}


function carnet_enregistre(){

	$epreuve = $_POST['epreuve'];
	$activite =$_POST['activite'];
	$exercice =$_POST['exercice'];
	$distance =$_POST['distance'];
	$unite =$_POST['unite'];
	$sensation =$_POST['sensation'];
	$lieux =$_POST['lieux'];
	$condition =$_POST['condition'];
	$commentaire =$_POST['commentaire'];
	$submit = $_POST['submit'];


	if (isset($submit)) {

// La requete qui permettra d'enregistrer les informations entrer par l'utilisateur
		if ( empty($epreuve)|| empty($activite)|| empty($exercice) || empty($distance) || empty($unite) || empty($sensation) || empty($lieux) || empty($condition) || empty($commentaire)) {


			echo "<h1>Veuillez remplir tous les champs !!!</h1>";
			
			
		} else {

			carnetRegistre();
			echo "<h1>Votre note est bien enregistrer !!!</h1>";
			
			
		}
		


	}
}




function affiche_carnet(){

	$activite = affichageActivite();
	$epreuve =affichageEpreuve();
	$exercice = affichageExercice();
	$unit = affichageUnite();

	$carnet = afficheCarnet();
	include 'template/carnet_affiche.php';
	
}

function modifier_carnet(){
	// afin de les afficher dans les selectes
	$activite = affichageActivite();
	$epreuve =affichageEpreuve();
	$exercice = affichageExercice();
	$unit = affichageUnite();

	$note = affichernote();

	if (isset($_POST['submit'])) {
		if (empty($_POST['epreuve']) || empty($_POST['exercice']) || empty($_POST['activite']) || empty($_POST['sensation']) || empty($_POST['lieux']) || empty($_POST['condition']) || empty($_POST['unite']) || empty($_POST['commentaire']) || empty($_POST['distance'])) {
			echo "<h1>Veuillez remplir tous les champs !!!</h1>";
		} else {
			modifiernote();
			echo "<h1>Carnet mise à jours</h1>";
		}
	}

	require 'template/carnet_modif.php';
}



?>

