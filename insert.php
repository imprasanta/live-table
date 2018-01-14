<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "w3dbi";

    $connect = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "insert into person (fname, lname, email) VALUES ('".$_POST["first_name"]."', '".$_POST["last_name"]."', '".$_POST["email_address"]."')";
    if (mysqli_query($connect, $sql)) {
        echo "Data Inserted";
    }
