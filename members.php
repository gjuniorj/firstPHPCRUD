<?php

require_once ('dbConnection.php');


$mySQLConnection = dbConnect('localhost','sga','','sga_club');



function addMember()
{

}



function searchMember()
{

}


//Main code
switch ($_GET['register'])
{
    case 'register':

        addMember();
        break;

    case 'search':
        searchMember();
        break;
}





$name    = "\"" . $_GET['firstName'] . "\"";
$surname = "\"" . $_GET['lastName']  . "\"";
$age     = "\"" . $_GET['userAge']   . "\"";

$sql = "INSERT into members (name, surname, age) VALUES (" . $name . "," . $surname . "," . $age . "); " ;

$mySQLConnection->query($sql);

//This extension doesn't work from PHP 7.
//mysql_query($sql);

print_r($sql);



closeConnection($mySQLConnection);
