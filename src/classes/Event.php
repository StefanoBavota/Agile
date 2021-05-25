<?php

namespace App\Classes;

require_once __DIR__ . '/DBManager.php';

class Event extends DBManager
{
    public function createEvent($img, $name, $description, $data, $posti, $user_id)
    {
        $sql = "INSERT INTO eventi (img, name, description, data, posti, user_id) VALUES ('$img', '$name', '$description', '$data', $posti, $user_id)";
        return $this->db->execute($sql);
    }

    public function eventByUserId($user_id)
    {
        $sql = "SELECT * FROM eventi WHERE user_id = $user_id";
        return $this->db->query($sql);
    }

    public function deleteEvent($id)
    {
        $sql = "DELETE FROM eventi WHERE id = $id";
        return $this->db->execute($sql);
    }

    public function getEventById($id)
    {
        $sql = "SELECT * FROM eventi WHERE id = $id";
        return $this->db->query($sql);
    }

    public function getAllEvent()
    {
        $sql = "SELECT * FROM eventi";
        return $this->db->query($sql);
    }
    
    public function editEvent($id, $img, $name, $description, $data, $posti)
    {
        $sql = "UPDATE eventi SET img = '$img', name = '$name', description = '$description', data = '$data', posti = $posti WHERE id = $id";
        return $this->db->execute($sql);
    }
}
