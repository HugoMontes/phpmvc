<?php
class PaginaController{

    public function __construct(){
        echo 'Controlador paginas cargado <br>';
    }

    public function index(){
        echo 'Metodo index <br>';
    }

    public function articulos(){
        echo 'Metodo articulos';
    }

    public function actualizar($id){
        echo 'Metodo: actualizar<br>';
        echo 'Parametro: '.$id;
    }
}