<?php
  class Season {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getSeasons(){
      $this->db->query('SELECT * 
                        FROM server_season
                        ');

      $results = $this->db->resultSet();
      return $results;
    }

    public function addSeason($data){
      $this->db->query('INSERT INTO server_season (year, description) VALUES(:year, :description)');
      // Bind values
      $this->db->bind(':year', $data['year']);
      $this->db->bind(':description', $data['description']);
 
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateSeason($data){
      $this->db->query('UPDATE server_season
                        SET 
                              year = :year,
                              description = :description
                        WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':year', $data['year']);
      $this->db->bind(':description', $data['description']);
 
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getSeasonById($id){
      $this->db->query('SELECT * FROM server_season WHERE id = :id');
      $this->db->bind(':id', $id);
      $row = $this->db->single();

      return $row;
    }

    public function deleteSeason($id){
      $this->db->query('DELETE FROM server_season WHERE id = :id');
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