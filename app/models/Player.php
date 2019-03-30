<?php
  class Player {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getPlayers(){
      $this->db->query('SELECT * 
                        FROM server_player
                        WHERE team = '.$_SESSION['user_team'].'
                        ');

      $results = $this->db->resultSet();
      return $results;
    }

    public function addPlayer($data){
        $this->db->query('INSERT INTO server_player (firstname, lastname, dateofbirth, jerseynumber, team) VALUES(:firstname, :lastname, :dateofbirth, :jerseynumber, :team)');
        // Bind values
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':dateofbirth', $data['dateofbirth']);
        $this->db->bind(':jerseynumber', $data['jerseynumber']);
        $this->db->bind(':team', $_SESSION['user_team']);
   
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

      public function updatePlayer($data){
        $this->db->query('UPDATE server_player 
                          SET 
                                firstname = :firstname,
                                lastname = :lastname,
                                dateofbirth = :dateofbirth,
                                jerseynumber = :jerseynumber,
                                team = :team
                          WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':dateofbirth', $data['dateofbirth']);
        $this->db->bind(':jerseynumber', $data['jerseynumber']);
        $this->db->bind(':team', $_SESSION['user_team']);
   
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

      public function getPlayerById($id){
        $this->db->query('SELECT * FROM server_player WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
  
        return $row;
      }

      public function deletePlayer($id){
        $this->db->query('DELETE FROM server_player WHERE id = :id');
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