<?php


try{

$dns="mysql:host=localhost;dbname=eraasoft";
$pdo=new PDO($dns,"root","");
//echo "connected";
}

catch(PDOException $e){

 echo "Error".$e->getmessage();
 die();
}

function insertDB($firstname,$lastname,$email,$password)
{
global $pdo;
	 $SQL="INSERT INTO users(firstname, lastname, email,password) VALUES ('$firstname','$lastname','$email','$password')";
     $pdo->exec($SQL);
}






?>