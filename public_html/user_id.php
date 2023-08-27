<?php
session_start();
include __DIR__ . '/../include/DatabaseConnection.php';
	
if (isset($_SESSION['user']) && isset($_SESSION['password'])) {

    include __DIR__ . '/../include/Access_functions.php';

    IsLogged($pdo);

} else {
    header('location: index.php');
}

if (isset($_GET['id_user']) ) {
    try {
        
        include __DIR__ . '/../include/Meli_functions.php';
        include __DIR__ . '/../include/DatabaseConnection.php';
        
        $id_client = (int)$_GET['id_user'];
    
        //////////////////////////////////////
        $user = info_user($pdo,$id_client);
        
        print_r($user);
        
    } catch (PDOException $e) {
        echo ('Usuario no resgistrado ' . $e);
    }
           
        //////////////////////////////////////////////////
    
} 