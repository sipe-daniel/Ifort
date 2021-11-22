<?php
	session_start();
	require('config/database.php');

	include('filters/guest_filter.php');
	require('includes/functions.php');
	require("includes/constants.php");


	$stmt = $bd->query('SELECT * FROM avis');
	if ($stmt !== false) {
		$reviews = $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	if(isset($_POST['register'])){ 

		if(not_empty(['name','pseudo','email','password','password_confirm'])){

			$errors = [];

			extract($_POST);
			if(strlen($name) < 3){
				$errors[] = "nom trop court (3 caracteres minimum)";
			}

			if(strlen($pseudo) < 3){
				$errors[] = "Pseudo trop court (3 caracteres minimum)";
			}

			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors[] = "Adresse email invalide !"; 
			}

			if(strlen($password) < 3){
				$errors[] = "Mot de passe trop court (6 caracteres minimum)";
			}else{
				if($password != $password_confirm){
					$errors[] = "les deux mots de passe ne concordent pas! ";
				}
			}

			if(is_already_in_use('pseudo',$pseudo,'users')){
				$errors[] = "Pseudo déjà utilisé!";
			}

			if(is_already_in_use('email',$email,'users')){
				$errors[] = "Adresse E-mail déjà utilisé!";
			}

			if(count($errors)==0){
			
				$password = password_hash($password,PASSWORD_BCRYPT);
				

				$token = sha1($pseudo.$email.$password);


				$req = 'INSERT INTO users (name, pseudo, email, password) VALUES (?, ?, ?, ?)';
				$res = $bd->prepare($req);
				$res->execute([e($name), e($pseudo),e($email), $password]);
                
				header('Location: login.php');

			}else{
				save_input_data();
			}
			
		}else{ 
			$errors[] = "veuillez remplir tous les champs ! ";
			save_input_data();
		}



	}else{
		clear_input_data();
	}



?>

<?php require('views/register.view.php'); ?>