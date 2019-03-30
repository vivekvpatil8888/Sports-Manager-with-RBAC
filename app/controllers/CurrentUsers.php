<?php
  class CurrentUsers extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      // SOMETING IS WRONG HHERE
      $this->currentUserModel = $this->model('CurrentUser');
      $this->userModel = $this->model('User');
    }

    public function index(){
        // Get Players
        $users = $this->currentUserModel->getUsers();
  
        $data = [
          'users' => $users
        ];
  
        $this->view('currentusers/show', $data);
      }

      public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'username' => trim($_POST['username']),
            'role' => trim($_POST['role']),
            'password' => trim($_POST['password']),
            'team' => trim($_POST['team']),
            'league' => trim($_POST['league']),
            'username_err' => '',
            'role_err' => '',
            'password_err' => '',
            'team_err' => '',
            'league_err' => ''
          ];
  
          // Validate data
          if(empty($data['username'])){
            $data['username_err'] = 'Please enter username';
          }
          if(empty($data['role'])){
            $data['role_err'] = 'Please enter role';
          }
          if(empty($data['password'])){
            $data['password_err'] = 'Please enter Date of password';
          }
          if(empty($data['team'])){
            $data['team_err'] = 'Please enter the team';
          }
          if(empty($data['league'])){
            $data['league_err'] = 'Please enter the league';
          }
  
          // Make sure no errors
          if(empty($data['username_err']) && empty($data['role_err']) && empty($data['password_err']) && empty($data['team_err']) && empty($data['league_err'])){
            // Validated
            
            if($this->currentUserModel->addUser($data)){
              flash('post_message', 'User Added !');
              redirect('currentusers/show');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('currentusers/add', $data);
          }
  
        } else {
          $data = [
            'username' => '',
            'role' => '',
            'password' => '',
            'team' => '',
            'league' => ''
          ];
    
          $this->view('currentusers/add', $data);
        }
      }

      public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'id' => $id,
            'username' => trim($_POST['username']),
            'role' => trim($_POST['role']),
            'password' => trim($_POST['password']),
            'team' => trim($_POST['team']),
            'league' => trim($_POST['league']),
            'username_err' => '',
            'role_err' => '',
            'password_err' => '',
            'team_err' => '',
            'league_err' => ''
          ];
  
          // Validate data
          if(empty($data['username'])){
            $data['username_err'] = 'Please enter username';
          }
          if(empty($data['role'])){
            $data['role_err'] = 'Please enter role';
          }
          if(empty($data['password'])){
            $data['password_err'] = 'Please enter Date of password';
          }
          if(empty($data['team'])){
            $data['team_err'] = 'Please enter the team';
          }
          if(empty($data['league'])){
            $data['league_err'] = 'Please enter the league';
          }
  
          // Make sure no errors
          if(empty($data['username_err']) && empty($data['role_err']) && empty($data['password_err']) && empty($data['team_err']) && empty($data['league_err'])){
            // Validated
            
            if($this->currentUserModel->updateUser($data)){
              flash('post_message', 'User Updated !');
              redirect('currentusers/show');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('currentusers/edit', $data);
          }
  
        } else {
        // Get existing player from model
        $currentuser = $this->currentUserModel->getUserById($id);

        // Check for owner
        // if($post->user_id != $_SESSION['user_id']){
        //   redirect('posts');
        // }
        $data = [
            'id' => $id,
            'username' => $currentuser->username,
            'role' => $currentuser->role,
            'password' => $currentuser->password,
            'team' => $currentuser->team,
            'league' => $currentuser->league
          ];
    
          $this->view('currentusers/edit', $data);
        }
      }

      public function delete($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->currentUserModel->deleteUser($id)) {
                flash('post_message', 'User Removed !');
                redirect('currentusers/show');
            } else {
                die('someting gone wrong');
            }
        } else {
            redirect('currentusers/show');
        }
      }

  }