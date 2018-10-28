<?php
class PaginaController extends Controller{

    public function __construct(){
        echo 'Controlador paginas cargado <br>';
    }

    public function index(){
        // echo 'Metodo index <br>';
        // Probar con una vista inexistente
        // $this->view('informacion');
        // Probar con una vista que existe
        $this->view('pagina/index');
    }

    public function articulos(){
        echo 'Metodo articulos';
    }

    public function actualizar($id){
        echo 'Metodo: actualizar<br>';
        echo 'Parametro: '.$id;
    }
}