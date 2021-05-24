<?php

use PHPUnit\Framework\TestCase;
use App\Classes\Event;

require_once __DIR__ . '/../src/classes/Event.php';
require_once __DIR__ . '/../src/inc/init.php';

class createEventTest extends TestCase
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
    
    public function test_createEvent()
    {
        $eventMgr = new Event();
        $event = ['img' => 'https://images.vestiairecollective.com/cdn-cgi/image/w=1000,q=80,f=auto,/produit/11487631-1_1.jpg', 'name' => 'test', 'description' => 'test', 'data' => '2021-05-23', 'posti' => '66', , 'userId' => '3'];
        $createdEvent = $eventMgr->createEvent($event['img'], $event['name'], $event['description'], $event['data'], $event['posti'], $event['userId']);
        $dbEvent = $eventMgr->getEventById($createdEvent['id']);
        unset($dbEvent['id']);
        $this->assertEquals($event, $dbEvent);
    }
}