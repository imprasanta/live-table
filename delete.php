<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "w3dbi";

    $connect = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "delete from person where id = '".$_POST["id"]."'";
    if (mysqli_query($connect, $sql)) {
        echo "Data deleted";
    }
