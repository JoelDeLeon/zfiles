<?php
    error_reporting(-1);
    ini_set('display_errors', 'On');
?>

<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <link href="Normalize.css" rel="stylesheet">
    
    
    <style>
    body{
     text-align: center;
    background: url("http://40.media.tumblr.com/ceed02c850efe262a248979866e128b2/tumblr_mmtxa4tyj41qmxxrdo1_500.jpg");
    background-size: cover;
        background-attachment: fixed;
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
    
    #header{
     background:black;
    text-align: left;
    color:white;
    padding:10px 20px;
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
   
    select {
    margin:30px;
    width:450px;
    border: 1px solid #111;
    background: white;
    padding: 5px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius:0px;
    height: 34px;
  //  -webkit-appearance: none;
   // -moz-appearance: none;
  //  appearance: none;
}
    </style>
    
</head>
<body>
    
    <h1>_ARTIFEX_Registration</h1>
<div id="formcontainer">
<form method='post' action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type='text' placeholder='Last Name' name='lastname' size='50'><br>
    
    <input type='text' placeholder='First Name' name='firstname' size='50'><br>
    
    <input type='text' placeholder='Username' name='username' size='50'><br>
    
    <input type='password' placeholder='Password' name='pass' size='50'><br>
    
    <input type='password' placeholder='Confirm Password' name='conf_pass' size='50'><br>
    
<select name="occupation" id="occupation">
    <option>Select Occupation</option>
    <option value="model">Model</option>
    <option value="designer">Designer</option>
    <option value="publication">Publication</option>
    <option value="photographer">Photographer</option>
    <option value="stylist">Stylist</option>
    <option value="other">Other</option>
<input type='text' placeholder='Enter Occupation' name='otheroccupation' size='50' id="other"><br>
</select>
    
    <input type='text' placeholder='Email' name='email' size='50'><br>
    
    <input type='submit' value='Register'>
    </form>
    
</div>
    
    <script type="text/javascript">       
$('document').ready($("#other").hide());
        
$("#occupation").on('change', function(){
   
    if( $(this).val()==="other"){
        $("#other").show();
        }
        else{
        $("#other").hide();
        }
    
});   
    </script>
    
<?php


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        
        $m = new MongoClient("mongodb://1234:1234@ds055699.mongolab.com:55699/jdpersonal");
    
 $db = $m->jdpersonal;
 $collection = $db->log;

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$username = $_POST['username'];
$pass = $_POST['pass'];
$conf_pass = $_POST['conf_pass'];
$occupation = $_POST['occupation'];
$otheroccupation = "null";
$email = $_POST['email'];


if(strcmp($occupation, "other") == 0){
$otheroccupation = $_POST['otheroccupation'];
$occupation = strtolower($otheroccupation);
}

$vararray = array($lastname,$firstname,$username,$pass,$conf_pass,$occupation,$otheroccupation,$email);

 if(in_array("", $vararray) || strcmp($occupation, "Select Occupation") == 0){
            echo "<script> alert('Leave No Empty Fields');</script>";  
     die();   
            }
       

else if(strcmp($conf_pass, $pass) !== 0){
            echo "<script> alert('Passwords Do Not Match!');</script>";
            die();  
            }
        
           else{


 require_once('savesessioninfo.php');
        
        if(ssi($username, $email)){
            
        $document = array("username" => $username, "password" => $pass, "email" => $email, "lastname" => $lastname, "firstname" => $firstname, "occupation" => $occupation);
        
    $collection->insert($document);
            
         header("Location: /zfiles/loggedin.php");
         exit();  
        }
        
        else{
            echo "Error saving your information. Please try again.";
        }
        
   
      
    
    }
        
        
    }
 
 

    

 



                              



?>
</body>
</html>