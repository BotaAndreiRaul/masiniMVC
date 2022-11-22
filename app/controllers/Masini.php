<?php
    class Masini extends Controller{
        public function __construct() {
            $this->masiniModel = $this->model('masina');
        }
    
        public function register() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Process form

                // Sanitize POST
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                // Init data
                $data = [
                    'marca' => trim($_POST['marca']), 
                    'model' => trim($_POST['model']),
                    'culoare' => trim($_POST['culoare']),
                    'img_name' => $_FILES['imagine']['name'],
                    'img_tmp_name' => $_FILES['imagine']['tmp_name'],
                    'marca_err' => '', 
                    'model_err' => '',
                    'culoare_err' => '',
                    'imagine_err' => 'Introduceti imaginea'
                 ];

                 //Validare nume
                if(empty($data["marca"])) {
                    $data['marca_err'] = "Introduceti marca";
                }
                 
                //Validare model
                if(empty($data["model"])) {
                    $data['model_err'] = "Introduceti modelul";
                }

                //Validare culoare
                if(empty($data["culoare"])) {
                    $data['culoare_err'] = "Introduceti culoarea";
                }

                // Make sure errors are empty
                if($_FILES['imagine']['error'] === 0 && empty($data['marca_err']) && empty($data['model_err']) && empty($data['culoare_err'])) {
                    if($this->masiniModel->register($data)) {
                        header('Location: ' . URLROOT . 'liste');
                    } else {
                        die("Something went wrong");
                    }
                    
                } else {
                    // Load view with errors
                    $this->view('masini/register', $data);
                }
                
            } else {
                // Init data
                $data = [
                   'marca' => '', 
                   'model' => '',
                   'culoare' => '',
                   'marca_err' => '', 
                   'model_err' => '',
                   'culoare_err' => '',
                   'imagine_err' => ''
                ];

                // Load view
                $this->view('masini/register', $data);
            }
        }

    }