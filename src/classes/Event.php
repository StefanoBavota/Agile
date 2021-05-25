<?php

namespace App\Classes;

require_once __DIR__ . '/DBManager.php';

/*class Event2
{

    public $id;
    public $image;
    public $name;
    public $description;
    public $data;
    public $posti;
    public $user_id;

    public function __construct($id, $image, $name, $description, $data, $posti, $user_id)
    {
        $this->id = (int)$id;
        $this->image = $image;
        $this->name = $name;
        $this->description = $description;
        $this->data = $data;
        $this->posti = (int)$posti;
        $this->user_id = (int)$user_id;
    }

}*/

class Event extends DBManager
{

    public function getEvent($id) {
        $sql = "SELECT eventi.id, eventi.image, eventi.name, eventi.description, eventi.data, eventi.posti, eventi.user_id ";
        return $this->db->query($sql);
    }

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
    
    public function editEvent($id, $img, $name, $description, $data, $posti)
    {
        $sql = "UPDATE eventi SET img = '$img', name = '$name', description = '$description', data = '$data', posti = $posti WHERE id = $id";
        return $this->db->execute($sql);
    }
}
