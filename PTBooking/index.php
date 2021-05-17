<?php 
    require("db.php");
    session_start();

    
    // Check if session has been set (user logged in)
    
    if(!isset($_GET["page"])){
        if( !isset($_SESSION["userData"]) ){
            // if not logged in show login page 
            require("pages/login_view.php"); 
       }else{
            // if logged in show home page 
            require("pages/home_view.php");
        };
    }else{
        
        // Page Routing 
        $page = $_GET["page"]; 
        switch ($page){
            case "login":  
                require("pages/login_view.php");
                break; 
            case "home":
                require("pages/home_view.php");
                break;
            case "register":
                require("pages/register_view.php"); 
                break;
            default:
                require("pages/login_view.php");
                break; 
                   
        }
        
    }

    

?>

