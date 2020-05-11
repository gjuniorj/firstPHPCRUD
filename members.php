<?php

require_once ('dbConnection.php');



function addMember()
{

    $mySQLConnection = dbConnect('localhost','sga','','sga_club');

    $name    = "\"" . $_GET['firstName'] . "\"";
    $surname = "\"" . $_GET['lastName']  . "\"";
    $age     = "\"" . $_GET['userAge']   . "\"";

    $sql = "INSERT into members (name, surname, age) VALUES (" . $name . "," . $surname . "," . $age . "); " ;

    $mySQLConnection->query($sql);

    //This extension doesn't work from PHP 7.
    //mysql_query($sql);

    echo "New member registered.";

}



function searchMember()
{
    $mySQLConnection = dbConnect('localhost','sga','','sga_club');

    $memberName    = "\"" . $_GET['firstName'] . "\"";
    $memberSurname = "\"" . $_GET['lastName']  . "\"";
    $memberAge     = "\"" . $_GET['userAge']   . "\"";



    $sql = "SELECT name, surname, age FROM members WHERE" ;
    $sql .= " name = \"" . $memberName . "\" ";
    $sql .= " AND surname = \"" . $memberSurname . "\" ";
    $sql .= " AND age = \"" . $memberAge . "\"; ";

    $mySQLConnection->query($sql);

    print_r($sql);


}


// ************* Main code ******************* //


$selectedOption = $_GET['action'];

switch ($selectedOption)
{
    case 'register':
        addMember();
        break;

    case 'search':
        searchMember();
        break;
}


closeConnection($mySQLConnection);
