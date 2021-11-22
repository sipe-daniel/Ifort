<?php
// filtrer l'utilisateur 
if(!isset($_SESSION['user_id']) and !isset($_SESSION['pseudo'])){
	$_SESSION['forwarding_url'] = $_SERVER['REQUEST_URI'];

	set_flash('Vous devez etre connecté pour acceder a cette page.','danger');
	header('Location: login.php');
	exit();
}

