<?php

$hostname = 'localhost:3306';
$dbname = 'myo_annawu030';
$username = 'myo_annawu030';
$password = 'wRosG4$R';

// DSN (Data Source Name) specifies the host computer for the MySQL database 
// and the name of the database. If the MySQL database is running on the same server
// as PHP, use the localhost keyword to specify the host computer

$dsn = "mysql:host=$hostname;dbname=$dbname";

try 
{
   $db = new PDO($dsn, $username, $password);
   // dispaly a message to let us know that we are connected to the database 
   // echo "<p>You are connected to the database</p>";
}
catch (PDOException $e)     // handle a PDO exception (errors thrown by the PDO library)
{ 
   $error_message = $e->getMessage();        
   echo "<p>An error occurred while connecting to the database: $error_message </p>";
}
catch (Exception $e)       // handle any type of exception
{
   $error_message = $e->getMessage();
   echo "<p>Error message: $error_message </p>";
}

?>