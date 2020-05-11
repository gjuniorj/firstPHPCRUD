<?php

use PHPUnit\Framework\TestCase;

require_once ("dbConnection.php");

class TestDBConnection extends TestCase
{
    public function testCanConnect()
    {
        $this->assertIsObject(dbConnect("localhost", "sga", "", "sga_club"), "Connection prohibited.");
    }
}