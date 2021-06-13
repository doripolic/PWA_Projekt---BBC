<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $basename = "bbc-projekt";

    $dbc = mysqli_connect($servername, $username, $password, $basename) or
        die('Error connecting to MySQL server.' . mysqli_connect_error());

?>