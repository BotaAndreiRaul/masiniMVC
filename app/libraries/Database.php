<?php

class Database {
  protected $host = DB_HOST;
  protected $user = DB_USER;
  protected $pass = DB_PASS;
  protected $name = DB_NAME;

  private $result; // database statement

  public $conn = null;

  public function __construct(){
    // Creare conexiun
    $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);
    // Verificare conexiune
    if ($this->conn->connect_error) {
      die('Connection failed: ' . $this->conn->connect_error);
    }
  }


  // Get all records as an array
  public function getAll() {
    $sql = 'SELECT * FROM masini';
    $this->result = mysqli_query($this->conn, $sql);
    $masini = mysqli_fetch_all($this->result, MYSQLI_ASSOC);
    return $masini;
  }

  // Get single record as object
  public function getSingle($id) {
    $masina_id = mysqli_real_escape_string($this->conn, $id);
    $sql = "SELECT * FROM masini WHERE id='$masina_id'";
    $this->result = mysqli_query($this->conn, $sql);
    $masina = mysqli_fetch_assoc($this->result);
    return $masina;
  }
}


?>
