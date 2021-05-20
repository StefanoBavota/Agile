<?php

use PHPUnit\Framework\TestCase;

class DBConnectionnTest extends TestCase
{
    public function test_prova()
    {
       $this->assertEquals(1, 1);
    }

    public function setUp(): void
    {
        // wipe db manually
        $connection = new PDO("mysql:host={$_ENV['DB_HOST']};port={$_ENV['DB_PORT']};dbname={$_ENV['DB_DATABASE']}", $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        $connection->query("use information_schema");
        $tables = $connection->query("SELECT TABLE_NAME FROM TABLES WHERE TABLE_SCHEMA = '" . $_ENV['DB_DATABASE'] . "';");
        $connection->query("use {$_ENV['DB_DATABASE']}");
        foreach ( $tables->fetchAll(PDO::FETCH_ASSOC) as $table ) {
            $connection->query("TRUNCATE " . $table['TABLE_NAME'] . ";");
        } 
    }

    public function test_db_connection()
    {
        $connection = new PDO("mysql:host={$_ENV['DB_HOST']};port={$_ENV['DB_PORT']};dbname={$_ENV['DB_DATABASE']}", $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        $this->assertNotEmpty($connection);
    }
}