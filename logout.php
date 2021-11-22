<?php 
session_start();
// session_decode();

$_SESSION = [];

header('Location: login.php');