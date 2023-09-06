<?php

    $servername = '127.0.0.1';
    $username = 'root';
    $password = '';
    $dbname = "";
    $connection = mysqli_connect($servername, $username, $password, $dbname);
      
    // Check connection
    if(!$connection){
        die('Database connection error : ' .mysqli_error());
    }
    
?>