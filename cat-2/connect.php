<?php
    //connection to db server
    $server = 'localhost';
    $user = 'root';
    $password ='';
    $db = 'cat2webdevelopment';

    $connect = mysqli_connect($server,$user,$password,$db);

    if(!$connect){
        die(mysqli_error($connect));
    } 
    ?>