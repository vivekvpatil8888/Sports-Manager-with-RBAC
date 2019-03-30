<?php
  class Schedule {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getSchedule(){
      $this->db->query('SELECT * 
                        FROM server_schedule
                        WHERE hometeam = '.$_SESSION['user_team'].'
                        OR awayteam = '.$_SESSION['user_team'].'
                        ');

      $results = $this->db->resultSet();

      return $results;
    }

  }