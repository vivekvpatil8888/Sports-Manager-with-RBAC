<?php
  class Sports extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      // Loading Seasons Model and View
      $this->sportModel = $this->model('Sport');
      $this->userModel = $this->model('User');
    }

    public function index(){
        // Get Seasons
        $sports = $this->sportModel->getSports();
  
        $data = [
          'sports' => $sports
        ];
  
        $this->view('sports/show', $data);
      }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'name' => trim($_POST['name']),
            'name_err' => ''
          ];
  
          // Validate data
          if(empty($data['name'])){
            $data['name_err'] = 'Please enter name';
          }
          // Make sure no errors
          if(empty($data['name_err'])){
            // Validated
            
            if($this->sportModel->addSport($data)){
              flash('post_message', 'Sport Added !');
              redirect('sports/show');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('sports/add', $data);
          }
  
        } else {
          $data = [
            'name' => ''
          ];
    
          $this->view('sports/add', $data);
        }
      }

      public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'id' => $id,
            'name' => trim($_POST['name']),
            'name_err' => '',
          ];
  
          // Validate data
          if(empty($data['name'])){
            $data['name_err'] = 'Please enter name';
          }
  
          // Make sure no errors
          if(empty($data['name_err'])){
            // Validated
            
            if($this->sportModel->updateSport($data)){
              flash('post_message', 'Sport Updated !');
              redirect('sports/show');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('sports/edit', $data);
          }
  
        } else {
        // Get existing player from model
        $sport = $this->sportModel->getSportById($id);

        // Check for owner
        // if($post->user_id != $_SESSION['user_id']){
        //   redirect('posts');
        // }
          $data = [
            'id' => $id,
            'name' => $sport->name
          ];
    
          $this->view('sports/edit', $data);
        }
      } 

      public function delete($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->sportModel->deleteSport($id)) {
                flash('post_message', 'Sport Removed');
                redirect('sports/show');
            } else {
                die('someting gone wrong');
            }
        } else {
            redirect('sports/show');
        }
      }

    }