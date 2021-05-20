<?php

use PHPUnit\Framework\TestCase;

//use App\Ciao;
//use App\UserManager;
use UserManager;

require_once __DIR__ . '../src/classes/User.php';
require_once __DIR__ . '../src/classes/DB.php';

class RegisterTest extends TestCase {
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

    public function test_register()
    {
        // TEST REGISTER
        $userMgr = new UserManager;
        $user = $userMgr->register('Mario', 'Rossi', 'mariorossi@test.it', md5('password'));
        $userFromDb = "SELECT * FROM user WHERE email = 'mariorossi@test.it'";
        $this->assertEquals($user, $userFromDb);
    }
}