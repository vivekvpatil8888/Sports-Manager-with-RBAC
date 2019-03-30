<?php
  class CurrentUser {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Get users who are not admin or league managers
    public function getUsers(){
      $this->db->query('SELECT * 
                        FROM server_user
                        WHERE team = '.$_SESSION['user_team'].'
                        AND role >= '.$_SESSION['user_role'].'
                        ');

      $results = $this->db->resultSet();
      return $results;
    }

    public function addUser($data){
        $this->db->query('INSERT INTO server_user (username, role, password, team, league) VALUES(:username, :role, :password, :team, :league)');
        // Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':role', $data['role']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':team', $data['team']);
        $this->db->bind(':league', $_SESSION['user_team']);
   
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

      public function updateUser($data){
        $this->db->query('UPDATE server_user 
                          SET 
                                username = :username,
                                role = :role,
                                password = :password,
                                team = :team,
                                league = :league
                          WHERE username = :id');
        // Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':role', $data['role']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':team', $_SESSION['user_team']);
        $this->db->bind(':league', $data['league']);
   
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

    public function getUserById($id){
        $this->db->query('SELECT * FROM server_user WHERE username = :username');
        $this->db->bind(':username', $id);
  
        $row = $this->db->single();
  
        return $row;
      }

      public function deleteUser($id){
        $this->db->query('DELETE FROM server_user WHERE username = :username');
        // Bind values
        $this->db->bind(':username', $id);
        
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

  }