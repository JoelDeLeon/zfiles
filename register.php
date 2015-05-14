<?php
    error_reporting(-1);
    ini_set('display_errors', 'On');
?>

<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    
    
    <style>
    body{
     text-align: center;
    background: #314159;
    }
        
    h1{
     color:white;
    font-size:90px;
    
    }
    
    a{
     text-decoration: none; 
     color:white;
    font-size:50px;
    }
    
    a:hover{
     color:black;   
    }
    
    .button{
    width:200px;
    background:#7298CE;
    border-radius: 2px;
    padding:10px;
    margin: 20px auto;
        
    }
    
    
    </style>
    
</head>
<body>


<form method='post' action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type='text' placeholder='username' name='username' size='30'><br>
    <input type='text' placeholder='password' name='pass' size='30'><br>
    <input type='text' placeholder='confirm password' name='conf_pass' size='30'><br>
    <input type='text' placeholder='email' name='email' size='30'><br>
    <input type='submit' value='Register'>
    </form>
    

<?php


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        
        $m = new MongoClient("mongodb://1234:1234@ds055699.mongolab.com:55699/jdpersonal");
    
 $db = $m->jdpersonal;
 $collection = $db->log;
    
        $username = $_POST['username'];
            if(empty($username)){
             die("Username is empty<br>");   
            }
        $pass = $_POST['pass'];
            if(empty($pass)){
             die("Password is empty<br>");   
            }
        $conf_pass = $_POST['conf_pass'];
            if(strcmp($conf_pass, $pass) !== 0){
             die("Passwords Do Not Match!<br>");   
            }
        $email = $_POST['email'];
            if(empty($email)){
             die("Email is empty<br>");   
            }

        

        
          require_once('savesessioninfo.php');
        
        if(ssi($username, $email)){
            
        $document = array("username" => $username, "password" => $pass, "email" => $email);
        
    $collection->insert($document);
            
         header("Location: /SubLite/loggedin.php");
         exit();  
        }
        
        else{
            echo "Error saving your information. Please try again.";
        }
        
        
      
    
    }
 
 

    

 



                              



?>
</body>
</html>