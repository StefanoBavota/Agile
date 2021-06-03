<?php

use PHPUnit\Framework\TestCase;
use App\Classes\UserManager;

require_once __DIR__ . '/../src/inc/init.php';
require_once __DIR__ . '/../src/classes/UserManager.php';

class AdminTest extends TestCase
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
        foreach ($tables->fetchAll(PDO::FETCH_ASSOC) as $table) {
            $connection->query("TRUNCATE " . $table['TABLE_NAME'] . ";");
        }
    }

    public function test_admin()
    {
        $userMgr = new UserManager;

        $User = ['nome' => 'Mario', 'cognome' => 'Rossi', 'email' => 'mariorossi@test.it', 'password' => 'password', 'user_type_id' => 1, 'music_type_id' => 1];
        $userMgr->register($User['nome'], $User['cognome'], $User['email'], $User['password'], $User['music_type_id']);
        
        $userNew = ['nome' => 'MarioNew', 'cognome' => 'RossiNew', 'email' => 'mariorossi@test.it', 'password' => md5('password'), 'user_type_id' => '1', 'music_type_id' => '1'];
        $userMgr->updateUserType(1, $userNew['nome'], $userNew['cognome'], $userNew['email'], $userNew['user_type_id']);
        $dbUser = $userMgr->getUserByIdNoMusic(1)[0];
        
        unset($dbUser['id']);
        $this->assertEquals($userNew, $dbUser);
        
    }
}



