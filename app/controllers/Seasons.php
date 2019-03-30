<?php
  class Seasons extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      // Loading Seasons Model and View
      $this->seasonModel = $this->model('Season');
      $this->userModel = $this->model('User');
    }

    public function index(){
        // Get Seasons
        $seasons = $this->seasonModel->getSeasons();
  
        $data = [
          'seasons' => $seasons
        ];
  
        $this->view('seasons/show', $data);
      }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'year' => trim($_POST['year']),
            'description' => trim($_POST['description']),
            'year_err' => '',
            'description_err' => '',
          ];
  
          // Validate data
          if(empty($data['year'])){
            $data['year_err'] = 'Please enter year';
          }
          if(empty($data['description'])){
            $data['description_err'] = 'Please enter description';
          }
  
          // Make sure no errors
          if(empty($data['year_err']) && empty($data['description_err']) && empty($data['dateofbirth_err']) && empty($data['jerseynumber_err'])){
            // Validated
            
            if($this->seasonModel->addSeason($data)){
              flash('post_message', 'Season Added !');
              redirect('seasons/show');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('seasons/add', $data);
          }
  
        } else {
          $data = [
            'year' => '',
            'description' => '',
          ];
    
          $this->view('seasons/add', $data);
        }
      }

      public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'id' => $id,
            'year' => trim($_POST['year']),
            'description' => trim($_POST['description']),
            'year_err' => '',
            'description_err' => ''
          ];
  
          // Validate data
          if(empty($data['year'])){
            $data['year_err'] = 'Please enter year';
          }
          if(empty($data['description'])){
            $data['description_err'] = 'Please enter description';
          }
  
          // Make sure no errors
          if(empty($data['year_err']) && empty($data['description_err'])){
            // Validated
            
            if($this->seasonModel->updateSeason($data)){
              flash('post_message', 'Season Updated !');
              redirect('seasons/show');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('seasons/edit', $data);
          }
  
        } else {
        // Get existing player from model
        $season = $this->seasonModel->getSeasonById($id);

        // Check for owner
        // if($post->user_id != $_SESSION['user_id']){
        //   redirect('posts');
        // }
          $data = [
            'id' => $id,
            'year' => $season->year,
            'description' => $season->description,
          ];
    
          $this->view('seasons/edit', $data);
        }
      } 

      public function delete($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->seasonModel->deleteSeason($id)) {
                flash('post_message', 'Season Removed');
                redirect('seasons/show');
            } else {
                die('someting gone wrong');
            }
        } else {
            redirect('seasons/show');
        }
      }

    }