<?php



session_start(); 
require_once("../db.php");

//Check post parameters have been set
if (isset($_POST["user"]) && isset($_POST["pass"])){
    
    
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    
    $db = new PTDatabase(); // New DB object
    $data = $db->retriveUserByName($user);  
    
    if(!$data or $data == false){
        // Case -> No Account Exists (No data matching user name)
        echo("No user matching that name was found!");
        
    }elseif(password_verify($pass,$data["password"])){
        // Case -> Login Success (Correct user and pass)
        
        
        print("Login Success");
        $_SESSION["uid"] = $data['ID']; 
        $_SESSION["userData"] = $data; 
        header('Location: ../index.php');
        exit();
    }else{
        // Case -> Login Failed (Wrong password)
        // Route back to login page and send them a message.
        // Also need to limit attempts !Security!
        
        echo("passwords do not match!");
    }
            

            
    // if user does exists does password hash match?
            // if not accessed denied (report back)
            // if yes allow access and set session. 
    
}elseif(isset($_GET["logout"])){
    echo "error: missing parameters"; 
    if(isset($_SESSION["userData"])){
        // Lets log out
        session_start();
        unset($_SESSION);
        session_destroy();
        session_write_close();
        header('Location: ../index.php');
        exit();
    }
}
