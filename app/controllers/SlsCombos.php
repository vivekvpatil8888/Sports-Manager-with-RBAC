<?php
  class SlsCombos extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      // Loading SlsCombo Model and View
      $this->slscomboModel = $this->model('SlsCombo');
      $this->userModel = $this->model('User');
    }

    public function index(){
        // Get SlsCombos
        $slscombos = $this->slscomboModel->getSlsCombos();
  
        $data = [
          'slscombos' => $slscombos
        ];
  
        $this->view('slscombos/show', $data);
      }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'sport' => trim($_POST['sport']),
            'league' => trim($_POST['league']),
            'season' => trim($_POST['season']),
            'sport_err' => '',
            'league_err' => '',
            'season_err' => '',
          ];
  
          // Validate data
          if(empty($data['sport'])){
            $data['sport_err'] = 'Please enter sport';
          }
          if(empty($data['league'])){
            $data['league_err'] = 'Please enter league';
          }
          
          if(empty($data['season'])){
            $data['season_err'] = 'Please enter season';
          }
  
  
          // Make sure no errors
          if(empty($data['sport_err']) && empty($data['league_err']) && empty($data['season_err'])){
            // Validated
            
            if($this->slscomboModel->addSlsCombo($data)){
              flash('post_message', 'Combo Added !');
              redirect('slscombos/show');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('slscombos/add', $data);
          }
  
        } else {
          $data = [
            'sport' => '',
            'league' => '',
            'season' => '',
          ];
    
          $this->view('slscombos/add', $data);
        }
      }

      public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'id' => $id,
            'sport' => trim($_POST['sport']),
            'league' => trim($_POST['league']),
            'season' => trim($_POST['season']),
            'sport_err' => '',
            'league_err' => '',
            'season_err' => ''
          ];
  
          // Validate data
          if(empty($data['sport'])){
            $data['sport_err'] = 'Please enter sport';
          }
          if(empty($data['league'])){
            $data['league_err'] = 'Please enter league';
          }
          if(empty($data['league'])){
            $data['season_err'] = 'Please enter league';
          }
  
          // Make sure no errors
          if(empty($data['sport_err']) && empty($data['league_err']) && empty($data['season_err'])){
            // Validated
            
            if($this->slscomboModel->updateSlsCombo($data)){
              flash('post_message', 'SlsCombo Updated !');
              redirect('slscombos/show');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('slscombos/edit', $data);
          }
  
        } else {
        // Get existing player from model
        $slscombo = $this->slscomboModel->getSlsComboById($id);

        // Check for owner
        // if($post->user_id != $_SESSION['user_id']){
        //   redirect('posts');
        // }
          $data = [
            'id' => $id,
            'sport' => $slscombo->sport,
            'league' => $slscombo->league,
            'season' => $slscombo->season,
          ];
    
          $this->view('slscombos/edit', $data);
        }
      } 

      public function delete($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->slscomboModel->deleteSlsCombo($id)) {
                flash('post_message', 'Combo Removed');
                redirect('slscombos/show');
            } else {
                die('someting gone wrong');
            }
        } else {
            redirect('slscombos/show');
        }
      }

    }