<?php
  class Schedules extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      // SOMETING IS WRONG HHERE
      $this->postModel = $this->model('Schedule');
      $this->userModel = $this->model('User');
    }

    public function index(){
        // Get posts
        $schedule = $this->postModel->getSchedule();
  
        $data = [
          'schedules' => $schedule
        ];
  
        $this->view('schedules/show', $data);
      }

  }