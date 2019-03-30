<?php
  class SlsCombo {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getSlsCombos(){
      $this->db->query('SELECT * 
                        FROM server_slseason
                        ');

      $results = $this->db->resultSet();
      return $results;
    }

    public function addSlsCombo($data){
      $this->db->query('INSERT INTO server_slseason (sport, league, season) VALUES(:sport, :league, :season)');
      // Bind values
      $this->db->bind(':sport', $data['sport']);
      $this->db->bind(':league', $data['league']);
      $this->db->bind(':season', $data['season']);
 
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // public function updateSeason($data){
    //   $this->db->query('UPDATE server_slseason
    //                     SET 
    //                           year = :year,
    //                           description = :description
    //                     WHERE id = :id');
    //   // Bind values
    //   $this->db->bind(':id', $data['id']);
    //   $this->db->bind(':year', $data['year']);
    //   $this->db->bind(':description', $data['description']);
 
    //   // Execute
    //   if($this->db->execute()){
    //     return true;
    //   } else {
    //     return false;
    //   }
    // }

    // public function getSeasonById($id){
    //   $this->db->query('SELECT * FROM server_slseason WHERE id = :id');
    //   $this->db->bind(':id', $id);
    //   $row = $this->db->single();

    //   return $row;
    // }

    public function deleteSlsCombo($id){
      $this->db->query('DELETE FROM server_slseason WHERE id = :id');
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