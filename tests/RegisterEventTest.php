<?php

use PHPUnit\Framework\TestCase;
use App\Classes\Event;

require_once __DIR__ . '/../src/classes/Event.php';
require_once __DIR__ . '/../src/inc/init.php';

class RegisterEventTest extends TestCase
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

    public function test_addToRegisterEvent()
    {
        $eventMgr = new Event();

        $event = ['img' => 'image', 'name' => 'test', 'description' => 'test2', 'data' => '2021-06-24', 'posti' => '66', 'user_id' => '1', 'music_type_id' => '2', 'email' => 'aaa@.it'];
        $eventMgr->createEvent($event['img'], $event['name'], $event['description'], $event['data'], $event['posti'] + 1, $event['user_id'], $event['music_type_id']);

        $eventMgr->addToRegister(1, 'aaa@.it');
        $calendarEvent = $eventMgr->getCurrentRegisterEvent('aaa@.it')[0];

        unset($calendarEvent['eventi_id']);
        unset($calendarEvent['id']);
        $this->assertEquals($event, $calendarEvent);
    }
}