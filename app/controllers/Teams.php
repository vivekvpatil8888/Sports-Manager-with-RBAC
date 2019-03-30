<?php
  class Teams extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      // Loading Team Model and View
      $this->teamModel = $this->model('Team');
      $this->userModel = $this->model('User');
    }

    public function index(){
        // Get Teams
        $teams = $this->teamModel->getTeams();
  
        $data = [
          'teams' => $teams
        ];
  
        $this->view('teams/show', $data);
      }
      
      public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'name' => trim($_POST['name']),
            'mascot' => trim($_POST['mascot']),
            'sport' => trim($_POST['sport']),
            'league' => trim($_POST['league']),
            'season' => trim($_POST['season']),
            'picture' => trim($_POST['picture']),
            'homecolor' => trim($_POST['homecolor']),
            'awaycolor' => trim($_POST['awaycolor']),
            'maxplayers' => trim($_POST['maxplayers']),
            'name_err' => '',
            'mascot_err' => '',
            'sport_err' => '',
            'league_err' => '',
            'season_err' => '',
            'picture_err' => '',
            'homecolor_err' => '',
            'awaycolor_err' => '',
            'maxplayers_err' => '',
          ];
  
          // Validate data
          if(empty($data['name'])){
            $data['name_err'] = 'Please enter name';
          }
          if(empty($data['mascot'])){
            $data['mascot_err'] = 'Please enter mascot';
          }
          if(empty($data['sport'])){
            $data['sport_err'] = 'Please enter sport';
          }
          if(empty($data['league'])){
            $data['league_err'] = 'Please enter league';
          }
          if(empty($data['season'])){
            $data['season_err'] = 'Please enter season';
          }
          if(empty($data['homecolor'])){
            $data['homecolor_err'] = 'Please enter homecolor';
          }
          if(empty($data['awaycolor'])){
            $data['awaycolor_err'] = 'Please enter awaycolor';
          }
          if(empty($data['maxplayers'])){
            $data['maxplayers_err'] = 'Please enter maxplayers';
          }
  
          // Make sure no errors
          if(empty($data['name_err']) && empty($data['mascot_err']) 
              && empty($data['sport_err']) && empty($data['league_err']) 
              && empty($data['season_err']) && empty($data['homecolor_err']) 
              && empty($data['awaycolor_err']) && empty($data['maxplayers_err']) ){
            // Validated
            
            if($this->teamModel->addTeam($data)){
              flash('post_message', 'Team Added !');
              redirect('teams/show');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('teams/add', $data);
          }
  
        } else {
          $data = [
            'name' => '',
            'mascot' => '',
            'sport' => '',
            'league' => '',
            'season' => '',
            'picture' => '',
            'homecolor' => '',
            'awaycolor' => '',
            'maxplayers' => '',
          ];
    
          $this->view('teams/add', $data);
        }
      }

      public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'id' => $id,
            'name' => trim($_POST['name']),
            'mascot' => trim($_POST['mascot']),
            'sport' => trim($_POST['sport']),
            'league' => trim($_POST['league']),
            'season' => trim($_POST['season']),
            'picture' => trim($_POST['picture']),
            'homecolor' => trim($_POST['homecolor']),
            'awaycolor' => trim($_POST['awaycolor']),
            'maxplayers' => trim($_POST['maxplayers']),
            'name_err' => '',
            'mascot_err' => '',
            'sport_err' => '',
            'league_err' => '',
            'season_err' => '',
            'picture_err' => '',
            'homecolor_err' => '',
            'awaycolor_err' => '',
            'maxplayers_err' => '',
          ];
  
          // Validate data
          if(empty($data['name'])){
            $data['name_err'] = 'Please enter name';
          }
          if(empty($data['mascot'])){
            $data['mascot_err'] = 'Please enter mascot';
          }
          if(empty($data['sport'])){
            $data['sport_err'] = 'Please enter sport';
          }
          if(empty($data['league'])){
            $data['league_err'] = 'Please enter league';
          }
          if(empty($data['season'])){
            $data['season_err'] = 'Please enter season';
          }
          if(empty($data['homecolor'])){
            $data['homecolor_err'] = 'Please enter homecolor';
          }
          if(empty($data['awaycolor'])){
            $data['awaycolor_err'] = 'Please enter awaycolor';
          }
          if(empty($data['maxplayers'])){
            $data['maxplayers_err'] = 'Please enter maxplayers';
          }
  
          // Make sure no errors
          if(empty($data['name_err']) && empty($data['mascot_err']) 
              && empty($data['sport_err']) && empty($data['league_err']) 
              && empty($data['season_err']) && empty($data['homecolor_err']) 
              && empty($data['awaycolor_err']) && empty($data['maxplayers_err']) ){
          // Validated
            
            if($this->teamModel->updateTeam($data)){
              flash('post_message', 'Team Updated !');
              redirect('teams/show');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('teams/edit', $data);
          }
  
        } else {
        // Get existing player from model
        $team = $this->teamModel->getTeamById($id);

        // Check for owner
        // if($post->user_id != $_SESSION['user_id']){
        //   redirect('posts');
        // }

          $data = [
            'id' => $id,
            'name' => $team->name,
            'mascot' => $team->mascot,
            'sport' => $team->sport,
            'league' => $team->league,
            'season' => $team->season,
            'picture' => $team->picture,
            'homecolor' => $team->homecolor,
            'awaycolor' => $team->awaycolor,
            'maxplayers' => $team->maxplayers,
          ];
    
          $this->view('teams/edit', $data);
        }
      } 

      public function delete($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->teamModel->deleteTeam($id)) {
                flash('post_message', 'Team Removed');
                redirect('teams/show');
            } else {
                die('someting gone wrong');
            }
        } else {
            redirect('teams/show');
        }
      }

  }