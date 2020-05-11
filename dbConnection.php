<?php


function dbConnect($host, $user, $password, $database)
{
    $connection = mysqli_connect($host, $user, $password, $database);

    if(!($connection)) {
        throw new Exception('ERROR - dbConnect - Cannot connect to database.');

    }

}

function closeConnection($connection)
{
    mysql_close($connection);
}

