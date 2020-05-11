<?php


function dbConnect($host, $user, $password, $database)
{

    //OBS: The extension "mysql_connect" was removed from PHP 7.
    //Instead, we must use "mysqli_connect".
    $connection = mysqli_connect($host, $user, $password, $database);

    if(!($connection)) {
        throw new Exception('ERROR - dbConnect - Cannot connect to database.');

    }

    return $connection;

}

function closeConnection($connection)
{
    mysql_close($connection);
}

