<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    
     <link href="Normalize.css" rel="stylesheet"> 
    
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
     background:#7298CE;
    text-align: left;
    color:white;
    }
    #header{
     padding:5px 20px 5px;   
    }
        
   
    
    #outbttn{
     position:absolute;
    right:20px;
    top:25px;
    background:#314159;
    border-radius: 2px;
    padding:10px;
    
    }
    
    
    </style>
    
</head>
<body>

<?php

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString += $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function fgotpass($email, $username){
    
    $newpass = generateRandomString(4);
    
    $msg = "Hey, looks like you forgot your password.\n\n Well, here is a new one:$newpass\n Use this in the meantime and create a new password once you've logged back in.";
    
    mail($email, "Forgot Password", $msg);
    
    return true;
}


?>
    </body>
</html>