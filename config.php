<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "library";

   $connection = new mysqli($servername, $username, $password, $dbname); 
   if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }
//or die("I couldn't connect to your database, please make sure your info is correct!");
//or die("I couldn't find the database table make sure it's spelt right!");
?>
