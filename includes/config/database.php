<?php

function conectDb() : mysqli{
    $db = mysqli_connect('localhost', 'root', 'root', 'seguros');

    if(!$db){
        echo "ERROR, We didn't connect it";
        exit;
    }

    // If u wanna check for the connection

    // echo '<pre>';
    //     echo "It's Aliveee";
    // echo '</pre>';
    
    return $db; 
};