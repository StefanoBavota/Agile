<?php

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase {
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

    public function testlogin()
    {
        // TEST REGISTER
        $userMgr = new UserManager;
        $userMgr->register('Mario', 'Rossi', 'mariorossi@test.it', md5('password'));
        $result = $userMgr->login('mariorossi@test.it', md5('password'));
        $this->assertEquals($result, true);
    }
}