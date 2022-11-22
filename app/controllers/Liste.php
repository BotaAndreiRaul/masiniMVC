<?php
    class Liste extends Controller {

        public function __construct(){
            $this->masiniModel = $this->model('masina');
        }
        
        public function index(){
            $masini = $this->masiniModel->getMasini();

            $data = [
              'masini' => $masini
            ];
           
            $this->view('liste/index', $data);
          }

          public function detalii($id){
            $masina = $this->masiniModel->getMasina($id);

            $data = [
              'masina' => $masina
            ];
           
            $this->view('liste/detalii', $data);
          }
    }