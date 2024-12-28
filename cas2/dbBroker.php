<?php

    $host = "localhost";
    $db = "kolokvijumi";
    $user = "root";
    $pass = "";



    $conn = new mysqli($host, $user, $pass, $db);

    if($conn->errno) {
        exit("Neuspesna konekcija: greska".$conn->error.", errkod".$conn->error);
    }









?>