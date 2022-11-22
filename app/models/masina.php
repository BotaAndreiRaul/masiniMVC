<?php 
    class masina {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function getMasini() {
            $masini = $this->db->getALL();
            return $masini;
        }

        public function getMasina($id) {
            $masina = $this->db->getSingle($id);
            return $masina;
        }

        public function register($data) {
            $img_ex = pathinfo($data['img_name'], PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png"); 
            if(in_array($img_ex_lc, $allowed_exs) ) {                         
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = APPROOT .'/views/upload/'.$new_img_name;
                move_uploaded_file($data['img_tmp_name'], $img_upload_path);   
                $marca = $data['marca'];
                $model = $data['model'];
                $culoare = $data['culoare'];
                $sql = "INSERT INTO masini(marca, model, culoare, imagine) VALUE ('$marca', '$model', '$culoare', '$new_img_name')";
                if(mysqli_query($this->db->conn, $sql)) {
                  //Succes
                  return true;
                }
                else {
                  return false;
                }
          }              
        }
    }