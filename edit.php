<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "w3dbi";

    $connect = mysqli_connect($servername, $username, $password, $dbname);

    $id = $_POST["id"];
    $text = $_POST["text"];
    $column_name = $_POST["column_name"];