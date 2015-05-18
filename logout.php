<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
 
    
    <style>
    body{
     text-align: center;
    background: url("http://33.media.tumblr.com/6f39661205770d551388cec0157b0cc5/tumblr_nbr6oaUvmy1qeereko1_400.gif");
    background-size: cover;
    
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
    background:black;
    border-radius: 2px;
    padding:10px;
    margin: 20px auto; 
    position:fixed;
    bottom:20px;
    right:0px;
    }
        
    .button:hover{
     background:white;
    color:black;
    }
    
        h1{
    position: fixed;
    top:-20px;
    left:0px;
    width:300px;
    padding:10px;
    background:black;
    color:white;
    font-size:50px;
    }
   
    
    </style>
    
</head>
<body>
    
    <h1>_ARTIFEX_</h1>
    
    <?php

unset($_SESSION["username"]);
unset($_SESSION["email"]);




    echo "<a class='bttn' href=login.php><div class='button'>Login</div></a>";


?>
    </body>
    
</html>