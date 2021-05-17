<?php

require_once("../db.php"); 




if (isset($_POST["user"]) && isset($_POST["password"]) && isset($_POST["email"])){
    
    $db = new PTDatabase();
    $exists = $db->checkUserExists($_POST["user"],$_POST["email"]);
    if($exist){
        echo("USer with that name or email already exists");
        return;
    }
    
    
    $username = $_POST["user"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    
    // To-Do: Validate Inputs 
    
    
    $accountMade = $db->addNewUser($username,$password,$email);
    if(!$accountMade){
        echo("Error Creating Account!");
    }else{
        header('Location: index.php?page=login&uc=1');
    }
    
}else{
    echo("Missing Parametereres"); 
}