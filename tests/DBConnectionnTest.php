<?php

use PHPUnit\Framework\TestCase;

//use App\Ciao;
//require_once __DIR__ . '/../src/Ciao.php';

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
        $connection->query("DROP DATABASE {$_ENV['DB_DATABASE']};");
        $connection->query("CREATE DATABASE {$_ENV['DB_DATABASE']};");
    }

    public function test_db_connection()
    {
        $connection = new PDO("mysql:host={$_ENV['DB_HOST']};port={$_ENV['DB_PORT']};dbname={$_ENV['DB_DATABASE']}", $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        // TEST DATABASE
        // $user = ['name' => 'Mario'];
        // chiami il metodo tuo che fa la registrazione
        // prendi la roba dal database
        // $userFromDb = "SELECT * FROM users WHERE name = " . $user['name'] . ";";
        // $this->assertEquals($user, $userFromDb);
        $this->assertNotEmpty($connection);
    }
}