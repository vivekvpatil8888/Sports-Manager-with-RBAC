<?php
  class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function register(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'username' => trim($_POST['username']),
          'role' => trim($_POST['role']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'team' => trim($_POST['team']),
          'league' => trim($_POST['league']),
          'username_err' => '',
          'role_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'team_err' => '',
          'league_err' => ''
        ];

        // Validate Email or Username
        if(empty($data['username'])){
          $data['username_err'] = 'Pleae enter email';
        } else {
          // Check email
          if($this->userModel->findUserByEmail($data['username'])){
            $data['username_err'] = 'Email is already taken';
          }
        }

        // Validate Role
        if(empty($data['role'])){
          $data['role_err'] = 'Please select role';
        }

        // Set Role values
        if($data['role'] == 'League Manager') {
          $data['role'] = 2;
        } elseif ($data['role'] == 'Team Manager') {
          $data['role'] = 3;
        } elseif ($data['role'] == 'Coach') {
          $data['role'] = 4;
        } elseif ($data['role'] == 'Parent') {
          $data['role'] = 5;
        } 

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Pleae enter password';
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must be at least 6 characters';
        }

        // Validate Confirm Password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Pleae confirm password';
        } else {
          if($data['password'] != $data['confirm_password']){
            $data['confirm_password_err'] = 'Passwords do not match';
          }
        }

        // Validate Team
        if(empty($data['team'])){
          $data['team_err'] = 'Please select your Team';
        }        

        // Validate League
        if(empty($data['league'])){
          $data['league_err'] = 'Please select your League';
        }
        // Make sure errors are empty
        if(empty($data['username_err']) && empty($data['role_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['team_err']) && empty($data['league_err'])){
          // Validated
          
          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          // Register User
          if($this->userModel->register($data)){
            flash('register_success', 'You are registered and can log in');
            redirect('users/login');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('users/register', $data);
        }

      } else {
        // Init data
        $data =[
          'username' => '',
          'role' => '',
          'password' => '',
          'confirm_password' => '',
          'team' => '',
          'league' => '',
          'username_err' => '',
          'role_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'team_err' => '',
          'league_err' => '',
        ];

        // Load view
        $this->view('users/register', $data);
      }
    }

    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'username' => trim($_POST['username']),
          'password' => trim($_POST['password']),
          'username_err' => '',
          'password_err' => '',      
        ];

        // Validate Email
        if(empty($data['username'])){
          $data['username_err'] = 'Pleae enter username';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }

        // Check for user/email
        if($this->userModel->findUserByEmail($data['username'])){
          // User found
        } else {
          // User not found
          $data['username_err'] = 'No user found';
        }

        // Make sure errors are empty
        if(empty($data['username_err']) && empty($data['password_err'])){
          // Validated
          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['username'], $data['password']);

          if($loggedInUser){
            // Create Session
            $this->createUserSession($loggedInUser);
          } else {
            $data['password_err'] = 'Password incorrect';

            $this->view('users/login', $data);
          }
        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'username' => '',
          'password' => '',
          'username_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('users/login', $data);
      }
    }

    public function createUserSession($user){
      $_SESSION['username'] = $user->username;
      $_SESSION['user_role'] = $user->role;
      $_SESSION['user_team'] = $user->team;
      $_SESSION['user_league'] = $user->league;
      redirect('dashboards');
    }

    public function logout(){
      unset($_SESSION['username']);
      unset($_SESSION['user_role']);
      session_destroy();
      redirect('users/login');
    }
  }