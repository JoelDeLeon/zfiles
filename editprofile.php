<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    
     <link href="Normalize.css" rel="stylesheet"> 
    
    <style>
    body,html{
    width:100%;
    height:100%;
    }
    body{
     background:url("http://40.media.tumblr.com/5b4d2a482c9a49c7ba5aeabfe9194c46/tumblr_nlseg1izor1tbxia5o1_1280.jpg");
background-size: cover;
background-attachment: fixed;
    text-align: center;
    }
        
    h1{
    position: absolute;
    top:-20px;
    left:0px;
 
    padding:10px;
    background:black;
    
    color:white;
    font-size:50px;
    
    }
        
        #formcontainer{
        top: 200px;
        margin:200px auto;
        background:black;
        width: 600px;
        padding:20px 0px;
        border: 2px dashed black;
    }
    input{
     padding:20px;
    margin:30px;
    }
    select{
    margin:30px;
    width:450px;
    }    
        
        
    </style>
    </head>
    <body>
        
<?php
  $username = $_SESSION['username'];
    
$m = new MongoClient("mongodb://1234:1234@ds055699.mongolab.com:55699/jdpersonal");

$lastname = "";
$firstname = "";
$password = "";
$occupation = "a";
$email = "";
$id = "";


 $db = $m->jdpersonal;
 $collection = $db->log;



$query = array('username' => $username);

$cursor = $collection->find($query);



foreach ($cursor as $doc) {
    //var_dump($doc);
    $id = $doc["_id"];
    
    $lastname = $doc["lastname"];
    $firstname = $doc["firstname"];
    $username = $doc["username"];
    $password = $doc["password"];
    $email =  $doc["email"];
    $occupation = $doc["occupation"]; 
    
    
}



?>
        
         
        
      <h1>_ARTIFEX_<?php
echo strtoupper($username); ?></h1>
        
        
        <div id="formcontainer">
<form method='post' action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type='text' placeholder='Last Name' name='lastname' size='50' value= "<?php echo $lastname ?>"><br>
    
    <input type='text' placeholder='First Name' name='firstname' size='50' value = "<?php echo $firstname ?>"><br>
    
    <input type='text' placeholder='Username' name='username' size='50' value = "<?php echo $username ?>"><br>
    
    <input type='password' placeholder='Password' name='pass' size='50' value ="<?php echo $password ?>"><br>
    
    <input type='password' placeholder='Confirm Password' name='conf_pass' size='50' value ="<?php echo $password ?>"><br>
    

<input type='text' placeholder=' Occupation' name='occupation' size='50' id="other" value ="<?php echo $occupation ?>"><br>

    
    <input type='text' placeholder='Email' name='email' size='50' value ="<?php echo $email ?>"><br>
    
    <input type='submit' value='Update Profile'>
    </form>
    
</div>
    
  
<?php


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$username = $_POST['username'];
$pass = $_POST['pass'];
$conf_pass = $_POST['conf_pass'];
$occupation = $_POST['occupation'];
$email = $_POST['email'];




 if(empty($username) || empty($pass) || empty($lastname) || empty($firstname) || empty($username) || empty($email) || empty($conf_pass) || empty($occupation)){
             die("Leave No Empty Fields");   
            }
       
        
            if(strcmp($conf_pass, $pass) !== 0){
             die("Passwords Do Not Match!<br>");   
            }
        
           

        
 require_once('savesessioninfo.php');
        
        if(ssi($username, $email)){
            
      $document = array("username" => $username, "password" => $pass, "email" => $email, "lastname" => $lastname, "firstname" => $firstname, "occupation" => $occupation);
        
    $collection->update(array("_id" => $id), $document);
            
         header("Location: /zfiles/loggedin.php");
         exit();  
        }
        
        else{
            echo "Error updating your information. Please try again.";
        }
        
        
      
    
    }

?>
    
    </body>
</html>