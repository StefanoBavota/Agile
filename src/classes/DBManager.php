<?php

namespace App\Classes;
require_once __DIR__ . '/DB.php';

class DBManager {

    protected $db;
    protected $columns;
    protected $tableName;

    public function __construct(){
        $this->db = new DB();
    }

    public function create($obj) {
        $createdUser = $this->db->insert_one($this->tableName, (array)$obj);
        return $createdUser;
    }

    public function delete($id)
    {
        $rowsDeleted = $this->db->delete_one($this->tableName, (int)$id);
        return (int) $rowsDeleted;
    }

    public function update($obj, $id)
    {
        $rowsUpdated = $this->db->update_one($this->tableName, (array) $obj, (int)$id);
        return (int) $rowsUpdated;
    }
}
