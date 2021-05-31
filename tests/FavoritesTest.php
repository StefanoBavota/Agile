<?php

use PHPUnit\Framework\TestCase;
use App\Classes\Event;

require_once __DIR__ . '/../src/classes/Event.php';
require_once __DIR__ . '/../src/inc/init.php';

class FavoritesTest extends TestCase
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

    public function test_addToFavorite()
    {
        $eventMgr = new Event();

        $user = ['user_id' => 1, 'music_type_id' => 1];
        $event = ['img' => 'image', 'name' => 'test', 'description' => 'test2', 'data' => '2021-05-24', 'posti' => 66, 'user_id' => $user['user_id'], 'music_type_id' => $user['music_type_id']];
        $eventMgr->createEvent($event['img'], $event['name'], $event['description'], $event['data'], $event['posti'], $event['user_id'], $event['music_type_id']);

        $eventMgr->addToFavoriteList(1, $user['user_id']);
        $favEvent = $eventMgr->getCurrentUserFavorites($user['user_id'])[0];

        unset($favEvent['id']);
        unset($favEvent['eventi_id']);
        $this->assertEquals($event, $favEvent);
    }
}
