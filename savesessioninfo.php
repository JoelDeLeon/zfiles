<?php

    function ssi($username, $email){
        
        session_start();
        
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        
        return true; 
        
        
    }


?>