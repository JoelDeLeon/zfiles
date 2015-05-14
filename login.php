

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
   
    <input type='submit' value='Login'>
    </form>
    
    
<?php


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $m = new MongoClient("mongodb://1234:1234@ds055699.mongolab.com:55699/jdpersonal");
    
 $db = $m->jdpersonal;
 $collection = $db->log;
    
        $username = $_POST['username'];
            if(empty($username)){
             echo "Empty Username<br>";   
            }
        $pass = $_POST['pass'];
            if(empty($pass)){
             echo "Empty Password<br>";   
            }
        
        $user = $collection->findOne(array("username" => $username));
        
        if($user == null)
        {
         echo "Invalid Username!";   
        }
        else{
            $userpass = $user["password"];
            if(strcmp($userpass, $pass) == 0){
                require_once('savesessioninfo.php');
                ssi($username, $pass);
                header("Location:/SubLite/loggedin.php");
                exit();
            }
            else{
               
             echo "Invalid Password!";   
            
            }
        }
    
    }
        ?>

    </body>
</html>