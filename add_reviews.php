<?php
session_start();
require('config/database.php');
require("includes/constants.php");
require("includes/functions.php");

   
	if(isset($_POST['add_reviews'])){ 

		if(not_empty(['name','email','content','note'])){

			$errors = [];
            
			extract($_POST);
			if(strlen($name) < 3){
				$errors[] = "nom trop court (3 caracteres minimum)";
			}

			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors[] = "Adresse email invalide !"; 
			}

            if(strlen($content) < 3){
				$errors[] = "commentaire trop court (3 caracteres minimum)";
			}

			if(is_already_in_use('email',$email,'users')){
				$errors[] = "Adresse E-mail déjà utilisé!";
			}

			if(count($errors)==0){	
                $note = ($note=='zero')? '0' : $note;
                $req = $bd->query('SELECT * FROM avis');
                $reviews = $req->fetchAll(PDO::FETCH_OBJ);
                $already_write = false;
                if ($req !== false) {
                    foreach ($reviews as $review){
                        if($review->email == $email){
                            $already_write = true;
                        } 
                    }
                }

                

                if(!$already_write){
                    $req = 'INSERT INTO avis (name, email, content, note) VALUES (?, ?, ?, ?)';
                    $res = $bd->prepare($req);
                    $res->execute([e($name), e($email),e($content), $note]);
                }else{
                    $q=$bd->prepare('UPDATE avis 
							SET name = :name, email = :email, content = :content,
							note = :note
							WHERE email = :email');
                    $q->execute([
                        'name' => $name,
                        'email' => $email,
                        'content' => $content,
                        'note' => $note
                    ]); 
                    $already_write = false;
                }

				header('Location: index.php');

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

    require("views/add_reviews.view.php");

?>



