
<?php
	session_start();
	require('config/database.php');

	include('filters/guest_filter.php');
	require('includes/functions.php');
	require("includes/constants.php");

	$stmt = $bd->query('SELECT * FROM users');
	if ($stmt !== false) {
		$reviews = $stmt->fetchAll(PDO::FETCH_OBJ);
	}


	if(isset($_POST['login'])){ 
		
		if(!not_empty(['indentifiant','password'])){
			extract($_POST);
		
			$q=$bd->prepare("SELECT id,pseudo,email, password as hashed_password FROM users 
							WHERE (pseudo = :identifiant OR email = :identifiant)
							 AND active ='1'");
			$q->execute([
				'identifiant' => $identifiant
			]);

			$user = $q->fetch(PDO::FETCH_OBJ);

			if($user && password_verify($password, $user->hashed_password)){
				$_SESSION['user_id'] = $user->id;
				$_SESSION['pseudo'] = $user->pseudo;
				$_SESSION['email'] = $user->email;
				redirect_intent_or('index.php?id='.$user->id);
			}else{
				// set_flash('Combinaison Identifiant/Password incorrecte !','danger');
				save_input_data();
			}

		}
	}else{
		clear_input_data();
	}

 require("views/login.view.php");