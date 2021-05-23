<?php

namespace App\Classes;

require_once __DIR__ . '/DBManager.php';

class Event extends DBManager
{
    public function createEvent($img, $name, $description, $data, $posti, $user_id)
    {
        $sql = "INSERT INTO eventi (img, name, description, data, posti, user_id) VALUES ('$img', '$name', '$description', '$data', $posti, $user_id)";
        $resultSet = $this->db->execute($sql);
        if (!$resultSet) {
            return array('error' => 'Hai già inserito l\'evento');
        }
        return array('error' => '');
    }
}
