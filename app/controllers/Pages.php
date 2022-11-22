<?php
  class Pages extends Controller {
    public function __construct(){
      
    }
    
    public function index(){

      $data = [
        'title' => 'Bine ati venit!',
        'description' => 'Aplicatie de adaugare masini folosind MVC'
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About',
        'description' => 'Aceasta este o aplicatie de gestiune masini'
      ];

      $this->view('pages/about', $data);
    }
  }