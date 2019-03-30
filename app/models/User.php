<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Regsiter user
    public function register($data){
      $this->db->query('INSERT INTO server_user(username, role, password, team, league) VALUES(:username, :role, :password, :team, :league)');
      // Bind values
      $this->db->bind(':username', $data['username']);
      $this->db->bind(':role', $data['role']);
      $this->db->bind(':password', $data['password']);
      $this->db->bind(':team', $data['team']);
      $this->db->bind(':league', $data['league']);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Login User
    public function login($username, $password){
      $this->db->query('SELECT * FROM server_user WHERE username = :username');
      $this->db->bind(':username', $username);

      $row = $this->db->single();

      $hashed_password = $row->password;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }

    // Find user by email
    public function findUserByEmail($username){
      $this->db->query('SELECT * FROM server_user WHERE username = :username');
      // Bind value
      $this->db->bind(':username', $username);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Get User by ID
    public function getUserById($id){
      $this->db->query('SELECT * FROM users WHERE id = :id');
      // Bind value
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }
  }