<?php

namespace App\Classes;

use PDOException;

require_once __DIR__ . '/DBManager.php';
class Event extends DBManager
{

    public function createEvent($img, $name, $description, $data, $posti, $user_id, $musicType)
    {
        $sql = "INSERT INTO eventi (img, name, description, data, posti, user_id, music_type_id) VALUES ('$img', '$name', '$description', '$data', $posti, $user_id, $musicType)";
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
        $sql = "SELECT * FROM eventi INNER JOIN music_type on music_type_id = music_type.id WHERE eventi.id = $id;";
        return $this->db->query($sql);
    }

    public function getEventByIdTest($id)
    {
        $sql = "SELECT * FROM eventi WHERE id = $id;";
        return $this->db->query($sql);
    }

    public function getCurrentRegisterEvent($email)
    {
        $sql = "SELECT * FROM eventi INNER JOIN register ON register.eventi_id = eventi.id AND register.email = '$email' WHERE eventi.data >= CURRENT_DATE ORDER by data";
        return $this->db->query($sql);
    }

    public function filterCalendar($email, $anno, $mese)
    {
        $sql = "SELECT * FROM eventi INNER JOIN register ON register.eventi_id = eventi.id AND register.email = '$email' where eventi.data LIKE '$anno-$mese-%' AND eventi.data >= CURRENT_DATE ORDER by data";
        return $this->db->query($sql);
    }
    public function filterEvent($anno, $mese)
    {
     
        $sql = "SELECT * FROM eventi where eventi.data LIKE '$anno-$mese-%' ORDER by data";
        return $this->db->query($sql);
    }

    public function getEventHomepage()
    {
        $sql = "SELECT * FROM eventi LIMIT 8";
        return $this->db->query($sql);
    }

    public function getEventHomepagePaginated($paginated)
    {   
        $offset = 12 * $paginated;
        $sql = "SELECT * FROM eventi OFFSETT LIMIT $offset, 12";
        return $this->db->query($sql);
    }

    public function countEventHomepagePages() {
        $sql = "SELECT count(*) as events_amount FROM eventi";
        return intval($this->db->query($sql)[0]['events_amount']) / 12;
    }

    public function editEvent($id, $img, $name, $description, $data, $posti, $musicType)
    {
        $sql = "UPDATE eventi SET img = '$img', name = '$name', description = '$description', data = '$data', posti = posti+$posti, music_type_id = $musicType  WHERE id = $id";
        return $this->db->execute($sql);
    }

    public function delete_favorite($eventId, $user_id)
    {
        $sql = "DELETE FROM favorites WHERE eventi_id = $eventId AND user_id = $user_id";
        $rowsDeleted = $this->db->execute($sql);;
        return (int) $rowsDeleted;
    }

    // Funzione inserimento evento selezionato nella tabella favoriti
    public function addToFavoriteList($eventId, $userId)
    {
        $sql = "INSERT INTO favorites (eventi_id, user_id) VALUES ($eventId, $userId)";
        $resultSet = $this->db->execute($sql);
        if (!$resultSet) {
            return array('error' => 'Hai già inserito l\'oggetto nella wishlist');
        }
        return array('error' => '');
    }

    public function getCurrentUserFavorites($userId)
    {
        $sql = "SELECT * FROM eventi INNER JOIN favorites ON favorites.eventi_id = eventi.id AND favorites.user_id = $userId";
        return $this->db->query($sql);
    }

    public function getCurrentUserFavoritesHomepage($userId)
    {
        $sql = "SELECT * FROM eventi INNER JOIN favorites ON favorites.eventi_id = eventi.id AND favorites.user_id = $userId LIMIT 4";
        return $this->db->query($sql);
    }

    public function addToRegister($eventId, $email, $nome, $data)
    {
        $sqlCheck = "SELECT * FROM register WHERE eventi_id = $eventId AND email = '$email'";
        $check = $this->db->query($sqlCheck);

        $sql = "INSERT INTO register (eventi_id, email) VALUES ($eventId, '$email')";

        if (!$check) {
            //send email
            $sub = "Mail dal Gruppo 6";
            $msg = "Ti sei registrato al concerto di: " . $nome . " che si terra' in data: " . $data;
            $rec = $email;
            mail($rec, $sub, $msg);

            //query update after check
            $decrese = "UPDATE eventi SET posti = posti -1 WHERE id = $eventId";
            $this->db->execute($decrese);
            return $this->db->execute($sql);
            exit;
        } else {
            echo "<script type='text/javascript'>alert('Ti sei già registrato');</script>";
        }
    }

    public function addComment($answer, $eventId, $userId)
    {
        $sql = "INSERT INTO argument (answer, eventi_id, user_id) VALUES ('$answer', $eventId, $userId)";
        return $this->db->execute($sql);
    }

    public function getCommentByEventId($eventId)
    {
        $sql = "SELECT argument.id AS answer_id, answer, eventi_id, user_id, nome, cognome FROM argument INNER JOIN user on user_id = user.id WHERE eventi_id = $eventId ORDER by argument.id DESC";
        return $this->db->query($sql);
    }

    public function deleteComment($id)
    {
        $sql = "DELETE FROM argument WHERE id = $id";
        return $this->db->execute($sql);
    }

    public function getAllMusicType()
    {
        $sql = "SELECT * FROM music_type";
        return $this->db->query($sql);
    }

    public function getCurrentHistoricEvent($email)
    {
        $sql = "SELECT * FROM eventi INNER JOIN register ON register.eventi_id = eventi.id AND register.email = '$email' WHERE eventi.data < CURRENT_DATE ORDER by data";
        return $this->db->query($sql);
    }

    public function getFeaturedEvents()
    {
        $sql = "SELECT * FROM eventi ORDER by id DESC LIMIT 6";
        return $this->db->query($sql);
    }

    public function getUserMusicType($music)
    {
        $sql = "SELECT * FROM eventi WHERE music_type_id='$music' LIMIT 6";
        return $this->db->query($sql);
    }
}
