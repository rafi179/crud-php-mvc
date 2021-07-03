<?php
// membuat kelas controller
class Controller{
    // membuat methode view
    public function view($view, $data = []){
        require_once '../app/views/'.$view.'.php';
    }
    // membuat methode untuk models
    public function model($model){
        require_once '../app/models/'.$model.'.php';
        return new $model;
    }
}