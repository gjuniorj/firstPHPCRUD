<?php

require_once ('dbConnection.php');


$mySQLConnection = dbConnect('localhost','sga','','sga_club');

//$tableName = "members";
$name    = '\'' . $_GET['firstName'] . '\'';
$surname = '\'' . $_GET['lastName']  . '\'';
$age     = '\'' . $_GET['userAge']   . '\'';

$sql = 'INSERT into members (name, surname, age) VALUES (' . $name . ',' . $surname . ',' . $age . '); ' ;

print_r($sql);

mysql_query($sql);

closeConnection($mySQLConnection);
