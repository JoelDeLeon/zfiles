

<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    
    <link href="Normalize.css" rel="stylesheet">
    
    <style>
    body{
     text-align: center;
    background: url("http://40.media.tumblr.com/ceed02c850efe262a248979866e128b2/tumblr_mmtxa4tyj41qmxxrdo1_500.jpg");
    background-size:cover;
   font-family: helvetica, sans-serif;
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
    
    input{
    padding:20px;
    margin:30px;
    }
        
        
    h1{
    position: fixed;
    top:-20px;
    left:0px;
    padding:10px;
    background:black;
    
    color:white;
    font-size:50px;
    
    }
    form{
     position:relative;
     top:200px;
        
    }
    subbttn{
       border: 1px solid #006;
    background: #9cf; 
    }
    
    
    </style>
    
</head>
<body>

    <h1>_ARTIFEX_Login</h1>

<form method='post' action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type='text' placeholder='Username' name='username' size='30'><br>
    <input type='password' placeholder='Password' name='pass' size='30'><br>
   
    <input type='submit' value='Login' class="subbttn">
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
                header("Location:/zfiles/loggedin.php");
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