<?php

if(isset($_SESSION['user_id']) and isset($_SESSION['pseudo'])){
	header('Location: index.php');
	exit();
}