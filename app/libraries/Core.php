<?php 
/*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
  error_reporting(E_ERROR | E_PARSE);
  class Core {
    protected $currentController = "pages";
    protected $currentMethod = "index";
    protected $params = [];

    public function __construct() {
        //print_r($this->getUrl());

        $url = $this->getUrl();

        // Cautare in controller pentru prima valoare
        if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')) { //ucwords = transforma prima litera din cuvant in litera mare
        // Daca exista, set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 Index
        unset($url[0]);
       }

       // Require the controller
       require_once '../app/controllers/' . $this->currentController . '.php';
       // instantiere controller
       $this->currentController = new $this->currentController;

       // verificare a doua parte din Url
       if(isset($url[1])) {
        // verifare daca exista metoda in controller
        if(method_exists($this->currentController, $url[1])) {
            $this->currentMethod = $url[1];
            unset($url[1]);
        }
       }

       // Get params
       $this->params = $url ? array_values($url) : []; 

       //call a callback wih an array of params
       call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl() {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
  }