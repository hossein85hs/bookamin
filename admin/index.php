<?php

session_start();

echo "admin ";

if(isset($_SESSION['is_login'])){
    echo " <h1> welcome ". $_SESSION['username'] ." </h1>";
    
}

else{
    header("Location: ../?page=login");
    exit();

}

?>