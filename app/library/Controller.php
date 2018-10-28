<?php
// Clase controlador principal
// Se encarga de cargar los modelos y vistas
class Controller{
    // Cargar el modelo
    public function model($model){
        // Cargar el archivo
        require_once '../app/model/'.$model.'.php';
        // Instanciar el modelo
        return new $model();
    }
    // Cargar la vista
    public function view($view, $data=[]){
        // Verificar si el archivo vista existe
        if(file_exists('../app/view/'.$view.'.php')){
            require_once '../app/view/'.$view.'.php';    
        }else{
            // Si el archivo de la vista no existe
            die('La vista no existe...');
        }
    }
}