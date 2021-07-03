<?php
// membuat kelas app 
class App{
    // property
    protected $controller = 'Home';
    protected $methode = 'index';
    protected $params = [];

    // constructor
    public function __construct(){
        // mengambil url 
        $url = $this->parseURL();

        // cek controller ada atau tidak
        if (isset($url[0])){
            if (file_exists('../app/controllers/'.$url[0].'.php')){
                $this->controller = $url[0];
                unset($url[0]);
            }
        }

        // membuat object kelas controller
        require_once '../app/controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;

        // cek methode
        if (isset($url[1])){ 
            // cek methode di kelas controller ada atau tidak
            if (method_exists($this->controller, $url[1])){
                $this->methode = $url[1];
                unset($url[1]);
            }
        }
        
        // cek parameter
        if (!empty($url)){
            $this->params = array_values($url);
        }

        /**
         * menjalankan controller dan methode jika ada, kemudian
         * kirimkan parameter yang jika ada
         */
        call_user_func_array([$this->controller, $this->methode], $this->params);
    }

    // methode parseURL : mengembalikan nilai URL
    public function parseURL(){
        if (isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}