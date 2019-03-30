<?php
  class Players extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      // SOMETING IS WRONG HHERE
      $this->playerModel = $this->model('Player');
      $this->userModel = $this->model('User');
    }

    public function index(){
        // Get Players
        $players = $this->playerModel->getPlayers();
  
        $data = [
          'players' => $players
        ];
  
        $this->view('players/show', $data);
      }

      public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'firstname' => trim($_POST['firstname']),
            'lastname' => trim($_POST['lastname']),
            'dateofbirth' => trim($_POST['dateofbirth']),
            'jerseynumber' => trim($_POST['jerseynumber']),
            'firstname_err' => '',
            'lastname_err' => '',
            'dateofbirth_err' => '',
            'jerseynumber_err' => ''
          ];
  
          // Validate data
          if(empty($data['firstname'])){
            $data['firstname_err'] = 'Please enter firstname';
          }
          if(empty($data['lastname'])){
            $data['lastname_err'] = 'Please enter lastname';
          }
          if(empty($data['dateofbirth'])){
            $data['dateofbirth_err'] = 'Please enter Date of Birth';
          }
          if(empty($data['jerseynumber'])){
            $data['jerseynumber_err'] = 'Please enter the Jersey Number';
          }
  
          // Make sure no errors
          if(empty($data['firstname_err']) && empty($data['lastname_err']) && empty($data['dateofbirth_err']) && empty($data['jerseynumber_err'])){
            // Validated
            
            if($this->playerModel->addPlayer($data)){
              flash('post_message', 'Player Added !');
              redirect('players/show');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('players/add', $data);
          }
  
        } else {
          $data = [
            'firstname' => '',
            'lastname' => '',
            'dateofbirth' => '',
            'jerseynumber' => ''
          ];
    
          $this->view('players/add', $data);
        }
      }

      public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'id' => $id,
            'firstname' => trim($_POST['firstname']),
            'lastname' => trim($_POST['lastname']),
            'dateofbirth' => trim($_POST['dateofbirth']),
            'jerseynumber' => trim($_POST['jerseynumber']),
            'firstname_err' => '',
            'lastname_err' => '',
            'dateofbirth_err' => '',
            'jerseynumber_err' => ''
          ];
  
          // Validate data
          if(empty($data['firstname'])){
            $data['firstname_err'] = 'Please enter firstname';
          }
          if(empty($data['lastname'])){
            $data['lastname_err'] = 'Please enter lastname';
          }
          if(empty($data['dateofbirth'])){
            $data['dateofbirth_err'] = 'Please enter Date of Birth';
          }
          if(empty($data['jerseynumber'])){
            $data['jerseynumber_err'] = 'Please enter the Jersey Number';
          }
  
          // Make sure no errors
          if(empty($data['firstname_err']) && empty($data['lastname_err']) && empty($data['dateofbirth_err']) && empty($data['jerseynumber_err'])){
            // Validated
            
            if($this->playerModel->updatePlayer($data)){
              flash('post_message', 'Player Updated !');
              redirect('players/show');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('players/edit', $data);
          }
  
        } else {
        // Get existing player from model
        $player = $this->playerModel->getPlayerById($id);

        // Check for owner
        // if($post->user_id != $_SESSION['user_id']){
        //   redirect('posts');
        // }
          $data = [
            'id' => $id,
            'firstname' => $player->firstname,
            'lastname' => $player->lastname,
            'dateofbirth' => $player->dateofbirth,
            'jerseynumber' => $player->jerseynumber
          ];
    
          $this->view('players/edit', $data);
        }
      }

      public function delete($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->playerModel->deletePlayer($id)) {
                flash('post_message', 'Post Removed');
                redirect('players/show');
            } else {
                die('someting gone wrong');
            }
        } else {
            redirect('players/show');
        }
      }

  }