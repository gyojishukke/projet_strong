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
<<<<<<< HEAD
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
>>>>>>> yvan
	}
	
	
}

?>

