<?php
  class Dashboards extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      // SOMETING IS WRONG HHERE
      $this->postModel = $this->model('Dashboard');
      $this->userModel = $this->model('User');
    }

    public function index(){
 
      $data = [
      ];

      $this->view('dashboards/index', $data);
    }

  }