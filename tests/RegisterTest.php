<?php

use PHPUnit\Framework\TestCase;
use App\Classes\UserManager;

require_once __DIR__ . '/../src/classes/UserManager.php';
require_once __DIR__ . '/../src/inc/init.php';

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
        $connection->query("use information_schema");
        $tables = $connection->query("SELECT TABLE_NAME FROM TABLES WHERE TABLE_SCHEMA = '" . $_ENV['DB_DATABASE'] . "';");
        $connection->query("use {$_ENV['DB_DATABASE']}");
        foreach ( $tables->fetchAll(PDO::FETCH_ASSOC) as $table ) {
            $connection->query("TRUNCATE " . $table['TABLE_NAME'] . ";");
        } 
    }
    
    public function test_create()
    {
        $userMgr = new UserManager;
        $userData = [
            'nome' => 'Francesco',
            'cognome' => 'Bianchi',
            'email' => 'francescobianchi@test.it',
            'password' => md5('password'),
            'user_type_id' => 2
        ];
        // created user
        $user = $userMgr->create($userData);
        // remove the user id assigned by dbms
        unset($user['id']);
        $this->assertEquals($user, $userData);
    }

    public function test_register()
    {
        // TEST REGISTER
        $userMgr = new UserManager;
        $User = ['nome' => 'Mario', 'cognome' => 'Rossi', 'email' => 'mariorossi@test.it', 'password' => 'password'];
        $createdUser = $userMgr->register($User['nome'], $User['cognome'], $User['email'], $User['password']);
        $dbUser = $userMgr->getUserById($createdUser['id']);
        // processing data pre assertion
        unset($dbUser['id']);
        unset($dbUser['user_type_id']);
        $User['password'] = md5($User['password']);
        $this->assertEquals($User, $dbUser);
    }

    // TEST DATABASE
    // $user = ['name' => 'Mario'];
    // chiami il metodo tuo che fa la registrazione
    // prendi la roba dal database
    // $userFromDb = "SELECT * FROM users WHERE name = " . $user['name'] . ";";
    // $this->assertEquals($user, $userFromDb);
}
