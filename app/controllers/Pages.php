<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      if(isLoggedIn()){
        redirect('posts');
      }

      $data = [
        'title' => 'Sports Manager',
        'description' => 'Sports data management website for League Managers, Team Managers, Coaches and Parents. '
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'Sports data management website for League Managers, Team Managers, Coaches and Parents. '
      ];

      $this->view('pages/about', $data);
    }
  }