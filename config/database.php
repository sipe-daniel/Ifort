<?php 

try{ 
    $bd = new PDO('sqlite:./config/ifort.sqlite');
}catch (PDOException $e){
    die ('DB Error');
}




?>