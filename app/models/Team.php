<?php
  class Team {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getTeams(){
      $this->db->query('SELECT * 
                        FROM server_team
                        WHERE id = '.$_SESSION['user_team'].' 
                        OR league  = '. $_SESSION['user_league']. '
                        ');

      $results = $this->db->resultSet();

      return $results;
    }

    public function addTeam($data){
      $this->db->query('INSERT INTO server_team (name, mascot, sport, league, season, picture, homecolor, awaycolor, maxplayers) 
                        VALUES(:name, :mascot, :sport, :league, :season, :picture, :homecolor, :awaycolor, :maxplayers)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':mascot', $data['mascot']);
      $this->db->bind(':sport', $data['sport']);
      $this->db->bind(':league', $data['league']);
      $this->db->bind(':season', $data['season']);
      $this->db->bind(':picture', $data['picture']);
      $this->db->bind(':homecolor', $data['homecolor']);
      $this->db->bind(':awaycolor', $data['awaycolor']);
      $this->db->bind(':maxplayers', $data['maxplayers']);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateTeam($data){
      $this->db->query('UPDATE server_team
                        SET  name = :name,
                              mascot = :mascot,
                              sport = :sport,
                              league = :league,
                              season = :season,
                              picture = :picture,
                              homecolor = :homecolor,
                              awaycolor = :awaycolor,
                              maxplayers = :maxplayers
                        WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':mascot', $data['mascot']);
      $this->db->bind(':sport', $data['sport']);
      $this->db->bind(':league', $data['league']);
      $this->db->bind(':season', $data['season']);
      $this->db->bind(':picture', $data['picture']);
      $this->db->bind(':homecolor', $data['homecolor']);
      $this->db->bind(':awaycolor', $data['awaycolor']);
      $this->db->bind(':maxplayers', $data['maxplayers']);
 
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getTeamById($id){
      $this->db->query('SELECT * FROM server_team WHERE id = :id');
      $this->db->bind(':id', $id);
      $row = $this->db->single();

      return $row;
    }

    public function deleteTeam($id){
      $this->db->query('DELETE FROM server_team WHERE id = :id');
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