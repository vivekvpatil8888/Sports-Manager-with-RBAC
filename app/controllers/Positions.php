<?php
  class Positions extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      // SOMETING IS WRONG HHERE
      $this->positionModel = $this->model('Position');
      $this->userModel = $this->model('User');
    }

    public function index(){
        // Get Positions
        $position = $this->positionModel->getPositions();
  
        $data = [
          'positions' => $position
        ];
  
        $this->view('positions/show', $data);
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
            $data['name_err'] = 'Please enter Position Name';
          }
  
          // Make sure no errors
          if(empty($data['name_err'])){
            // Validated
            if($this->positionModel->addPosition($data)){
              flash('post_message', 'Position Added !');
              redirect('positions/show');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('positions/add', $data);
          }
  
        } else {
          $data = [
            'name' => ''
          ];
    
          $this->view('positions/add', $data);
        }
      }
  }