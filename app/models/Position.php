<?php
  class Position {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getPositions(){
        $this->db->query('SELECT * 
                          FROM server_position
                          ');
  
        $results = $this->db->resultSet();
  
        return $results;
      }

    public function addPosition($data){
      $this->db->query('INSERT INTO server_position (name) VALUES(:name)');
      // Bind values
      $this->db->bind(':name', $data['name']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

  }