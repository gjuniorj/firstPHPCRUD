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

    closeConnection($mySQLConnection);

}



function searchMember()
{
    $mySQLConnection = dbConnect('localhost','sga','','sga_club');

    $memberName    = trim($_GET['firstName']) ;
    $memberSurname = trim($_GET['lastName'])  ;
    $memberAge     = trim($_GET['userAge'])   ;

    $sql  = "SELECT name, surname, age FROM members WHERE";


    //Dynamically creates sql query
    if ( $memberName != '' )
    {
        $sql .= " name = \"" . $memberName . "\" ";
    }

    if ( $memberSurname != '' )
    {
        //Checks if the last 5 characters of string are "WHERE"
        $sql .= (substr($sql, -5) === "WHERE") ? '' : " AND";
        $sql .= " surname = \"" . $memberSurname . "\" ";
    }

    if ( $memberAge != '' )
    {
        //Checks if the last 5 characters of string are "WHERE"
        $sql .= (substr($sql, -5) === "WHERE") ? '' : " AND";
        $sql .= " age = \"" . $memberAge . "\" ";
    }

    $sql .= ";";


//    $sql = "SELECT name, surname, age FROM members WHERE" ;
//    $sql .= " name = " . $memberName . " ";
//    $sql .= " AND surname = " . $memberSurname . " ";
//    $sql .= " AND age = " . $memberAge . "; ";

    $result = $mySQLConnection->query($sql);
    $numMembers = $result->num_rows;

    echo "Result(s):  " . $numMembers . PHP_EOL ;


    if ( $numMembers >= 1 )
    {

        do
        {
            $row = mysqli_fetch_row($result);

            $firstName = $row[0];
            $lastName = $row[1];
            $age = $row[2];

            echo "$firstName" . " " . $lastName . " " . $age . PHP_EOL;

        } while ( !(is_null($row)) );
    }

    else
        echo "No members found.";





    //print_r($sql);

    closeConnection($mySQLConnection);
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



