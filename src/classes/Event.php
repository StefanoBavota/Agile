<?php

namespace App\Classes;
require_once __DIR__ . '/DBManager.php';

class Event extends DBManager{
    public function createEvent($image, $name, $description, $data, $user_id) {
        $resultSet = $this->db->execute("INSERT INTO eventi (image, name, description, data, user_id) VALUES ('$image', '$name', '$description', '$data', $user_id)");
        if (!$resultSet) {
            return array('error' => 'Hai già inserito l\'evento');
        }
        return array('error' => '');
    }
}