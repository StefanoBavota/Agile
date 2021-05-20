<?php

use PHPUnit\Framework\TestCase;

//use App\Ciao;
//use UserManager;

//require_once __DIR__ . '../src/classes/User.php';
//require_once __DIR__ . '../src/classes/DB.php';

class RegisterTest extends TestCase
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

    public function test_create()
    {
        $userMgr = new UserManager;
        $user = $userMgr->create([
            'nome' => 'Francesco',
            'cognome' => 'Bianchi',
            'email' => 'francescobianchi@test.it',
            'password' => md5('password'),
            'user_type_id' => 2
        ]);
        $userFromDb = [
            'nome' => 'Francesco',
            'cognome' => 'Bianchi',
            'email' => 'francescobianchi@test.it',
            'password' => md5('password'),
            'user_type_id' => 2
        ];
        $this->assertEquals($user, $userFromDb);
    }

    public function test_register()
    {
        // TEST REGISTER
        $userMgr = new UserManager;
        $user = $userMgr->register('Mario', 'Rossi', 'mariorossi@test.it', md5('password'));
        $userFromDb = "SELECT * FROM user WHERE email = 'mariorossi@test.it'";
        $this->assertEquals($user, $userFromDb);
    }

    // TEST DATABASE
    // $user = ['name' => 'Mario'];
    // chiami il metodo tuo che fa la registrazione
    // prendi la roba dal database
    // $userFromDb = "SELECT * FROM users WHERE name = " . $user['name'] . ";";
    // $this->assertEquals($user, $userFromDb);
}
