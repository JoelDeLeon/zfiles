<?php session_start(); ?>

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
    <?php

unset($_SESSION["username"]);
unset($_SESSION["email"]);


echo "<h1>You have successfully logged out!</h1><br>";

    echo "<div class='button'><a class='bttn' href=login.php>Login</a></div>";


?>
    </body>
    
</html>