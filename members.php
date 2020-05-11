<?php

require_once ('dbConnection.php');


dbConnect('localhost','sga','','sga_club');

$tableName = "members";

$sql = "INSERT into " . $tableName . " VALUES " . $_GET['firstName'] . ", " . $_GET['lastName'] . ", " . $_GET['userAge'] . "; " ;

print_r($sql);

mysql_query($sql);
