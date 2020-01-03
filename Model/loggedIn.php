<?php

function loggedIn($check)
{
    if (isset($_COOKIE['loggeduser'])) {
        if ($check == "disable") {
            echo "disabled";
        } else if ($check == "logout") {
            unset($_COOKIE['loggeduser']);
            setcookie('loggeduser', '', time() - 3600, '/');
        }
    } else if(!isset($_COOKIE['loggeduser'])){
        if($check == "enable"){
        echo "disabled";
        }
    }
}

function logOut()
{
        unset($_COOKIE['loggeduser']);
        setcookie('loggeduser', '', time() - 3600);
        echo "cookie deleted";
        header("Location: login.php");
        exit;
    
}
