<?php
class PTDatabase {
    protected $databaseConnection;
    
    public function __construct()
    {
        $dbInfo = parse_ini_file("config.ini");
        $this->databaseConnection = new mysqli($dbInfo['host'], $dbInfo['user'], $dbInfo['pass'],$dbInfo['name']); 
        if ($this->getDB() -> connect_error){
            die("Database Error: ".connect_error);
        }
        print("Database-Message: Connection Success!");
    }
    
    public function getDB(){
        return $this->databaseConnection;
    }
    
    
    
    // Function: retriveUserByName
    // Parameters: $n = User Name 
    // Use: Gets a user from the database via user name
    function retriveUserByName($n){
    
        if ($this->getDB() -> connect_error){
            print("Database Error: ".connect_error); 
            return;
        }
        
        
        $q = $this->getDB()->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
        
        if(!$q){
            die("Database Error: Problem in retriveUserByName query!");
        }
        
        $q -> bind_param("s", $n); 
        $q -> execute();
        $result = $q->get_result();
        
        if (mysqli_num_rows($result) == 0){
            return false;
        }
        
        $user = mysqli_fetch_assoc($result);
        return $user;
        
       // if(is_callable($cb)){
        //    $cb($user);
        //}
    }
    
    // Function: checkUserExistsByName
    // Parameters: $n = User Name 
    // Use: Checks if user exists with user name provided
    public function checkUserExistsByName($n){
        if ($this->getDB() -> connect_error){
            print("Database Error: ".connect_error); 
            return;
        }
        
        
        $q = $this->getDB()->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
        
        if(!$q){
            die("Database Error: Problem in retriveUserByName query!");
        }
        
        $q -> bind_param("s", $n); 
        $q -> execute();
        $result = $q->get_result();
        
        return !(mysqli_num_rows($result) == 0); 
    }
    
    // Function: checkUserExistsByEmail
    // Parameters: $n = Email Address 
    // Use: Checks if user exists with email provided
    public function checkUserExistsByEmail($n){
        if ($this->getDB() -> connect_error){
            print("Database Error: ".connect_error); 
            return;
        }
        
        
        $q = $this->getDB()->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
        
        if(!$q){
            die("Database Error: Problem in retriveUserByName query!");
        }
        
        $q -> bind_param("s", $n); 
        $q -> execute();
        $result = $q->get_result();
        
        return !(mysqli_num_rows($result) == 0); 
    }
    
    
    // Function: checkUserExists
    // Parameters: $n = username, $e = Email Addresss
    // Use: Checks if user exists with user name or email provided
    
    public function checkUserExists($n,$e){
        return ($this->checkUserExistsByName($n) or $this->checkUserExistsByEmail($e));
    }
    
    function addNewUser($user,$pass,$email,$firstName,$lastName,$phoneNumber,$age){
        if ($this->getDB() -> connect_error){
            print("Database Error: ".connect_error); 
            return;
        }
        
        $hashedWord = password_hash($p, PASSWORD_DEFAULT); // Store the password as a hash (Security)
        
        $q = $this->getDB()->prepare("INSERT INTO users VALUES(0,?,?,?);");
        $q -> bind_param("ssssssi", $user,var_dump($hashedPassword),$firstName,$lastName,$email,$phone,$age); 
        $q -> execute();
        $result = $q->get_result();
        return (mysqli_affected_rows($result) >0 );
        
    }
}



?>