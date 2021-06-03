<?php

use PHPUnit\Framework\TestCase;
use App\Classes\Event;
use App\Classes\UserManager;

require_once __DIR__ . '/../src/classes/Event.php';
require_once __DIR__ . '/../src/classes/UserManager.php';
require_once __DIR__ . '/../src/inc/init.php';

class CreateCommentTest extends TestCase
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

    public function test_addComment()
    {
        $eventMgr = new Event();
        $userMgr = new UserManager;

        $user = $userMgr->register('Mario', 'Rossi', 'mariorossi@test.it', md5('password'), 1);

        $comment = ['answer' => 'ciao', 'eventi_id' => "1", 'user_id' => $user['id'], 'nome' => 'Mario', 'cognome' => 'Rossi'];
        $eventMgr->addComment($comment['answer'], $comment['eventi_id'], $comment['user_id']);
        $dbComment = $eventMgr->getCommentByEventId($comment['eventi_id'])[0];

        unset($dbComment['answer_id']);
        $this->assertEquals($comment, $dbComment);
    }
}
