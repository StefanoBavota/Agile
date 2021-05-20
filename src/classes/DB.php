<?php

namespace App\Classes;
use \PDO;

class DB {

  private $conn;
  public $pdo;

  public function __construct() {
    $this->conn = new PDO('mysql:dbname='. $_ENV['DB_DATABASE'] .';host=' . $_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  }

  public function query($sql) {
    $stmt = $this->conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function execute($sql) {
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
  }

 public function insert_one ($tableName, $columns = array()) {

    $strCol = '';
    foreach($columns as $colName => $colValue) {
      $strCol .= ' ' . $colName . ',';
    }
    $strCol = substr($strCol, 0, -1);

    $strColValues = '';
    foreach($columns as $colName => $colValue) {
      $strColValues .= " '" . $colValue . "' ,";
    }
    $strColValues = substr($strColValues, 0, -1);

    $query = "INSERT INTO $tableName ($strCol) VALUES ($strColValues)";
    //var_dump($query); die;

    $stmt = $this->conn->query($query);
    if ( !$stmt ) return null;
    $createdUser = $columns;
    $createdUser['id'] = $this->conn->lastInsertId();
    return $createdUser;

  }

}
