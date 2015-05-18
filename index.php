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
     text-align: center;
    background: url("http://38.media.tumblr.com/dd7668f8fba7ab41da3583db19b3a991/tumblr_n7ixxsJZib1qbovnfo1_1280.gif");
    background-size:cover;
    font-family: helvetica, sans-serif;
    
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
    
    a{
     text-decoration: none; 
    color:white;
    font-size:20px;
    margin:50px;
    }
    
    a:hover{
     text-decoration: underline;   
    }
    
   
    
    #logreg{
     position:fixed;
    bottom:0px;
    right:0px;
   margin: 20px 0px;
    padding:10px 0px;;
    background:black;
    color:white;
    }
        
    </style>
    
</head>
<body>
    
   
    <?php

        $username = $_SESSION['username'];

        $password = $_SESSION['password'];

        if(!$username && !$password){ }
    
        else{
           header("Location: /zfiles/loggedin.php");
         exit();
        }
    ?>
 
  <h1>_ARTIFEX_</h1> <br> 
    
    <div id="logreg">
   
    <a class='bttn' href=login.php>Login</a>
        <br><br>
        <a class='bttn' href=register.php>Register</a>
    
    </div>    
        
</body>
</html>