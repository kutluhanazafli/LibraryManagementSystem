<?php
$host='localhost';
$dbname = 'library';
$username = 'postgres';
$password = '1';

$dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";

try{
    // create a PostgreSQL database connection
    $db = new PDO($dsn);
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // display a message if connected to the PostgreSQL successfully
    if($db){
        //echo "Connected to the <strong>$db</strong> database successfully!";
    }
} catch (PDOException $e){
    // report error message
    echo $e->getMessage();
}
?>