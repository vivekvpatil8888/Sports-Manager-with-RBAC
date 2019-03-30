<?php
  class Sport {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getSports(){
      $this->db->query('SELECT * 
                        FROM server_sport
                        ');

      $results = $this->db->resultSet();
      return $results;
    }

    public function addSport($data){
      $this->db->query('INSERT INTO server_sport (name) VALUES(:name)');
      // Bind values
      $this->db->bind(':name', $data['name']);
 
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateSport($data){
      $this->db->query('UPDATE server_sport
                        SET 
                              name = :name
                        WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':name', $data['name']);
 
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getSportById($id){
      $this->db->query('SELECT * FROM server_sport WHERE id = :id');
      $this->db->bind(':id', $id);
      $row = $this->db->single();

      return $row;
    }

    public function deleteSport($id){
      $this->db->query('DELETE FROM server_sport WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $id);
      
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }



  }