<?php
session_start();
require('config/database.php');
require("includes/functions.php");
require('includes/constants.php');


extract($_POST);



$sort_by_note = null;
$sort_by_date = null;



$stmt = $bd->query('SELECT id, name, email, content, note, DATE("created_at") as created_at, hide FROM avis');
if ($stmt !== false) {
    $reviews = $stmt->fetchAll(PDO::FETCH_OBJ);
}
    
if ($review_date!="" && $review_note==""){
    $sort_by_date = [];
    foreach($reviews as $review){
        if(strcmp($review->created_at,$review_date)==0){
            array_push($sort_by_date,$review);
        }
    }
    // var_dump($sort_by_date);
}else if ($review_date=="" && $review_note!=""){
    $sort_by_note = [];
    foreach($reviews as $review){
        if(strcmp($review->note, $review_note)==0){
            array_push($sort_by_note,$review);
        }
    }
    // var_dump($sort_by_note);
}else if($review_date!="" && $review_note!=""){
    $sort_by_date = [];
    $sort_by_note = [];
    foreach($reviews as $review){
        if(strcmp($review->created_at, $review_date)==0){
            array_push($sort_by_date,$review);
        }
    }

    foreach($sort_by_date as $sbd){
        if(strcmp($sbd->note, $review_note)==0){
            array_push($sort_by_note,$sbd);
        }
    }
    // var_dump($sort_by_note);
}



if(isset($_GET['id']) && $_GET['id'] === get_session('user_id') && isset($_GET['change_status'],$_GET['status'] )){
    extract($_GET);
    $hide = $status ? 0 : 1;
    $q=$bd->prepare('UPDATE avis 
                    SET hide = :hide
                    WHERE id = :id');

    $q->execute([
        'hide' => $hide,
        'id' => $change_status,	
    ]);
    redirect('index.php?id='.get_session('user_id'));
}

require("views/index.view.php");

?>