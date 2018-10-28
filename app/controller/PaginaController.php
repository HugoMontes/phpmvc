<?php
class PaginaController extends Controller{

    public function __construct(){
        // echo 'Controlador paginas cargado <br>';
    }

    public function index(){
        // echo 'Metodo index <br>';
        $data = array(
            'titulo' => 'Bienvenidos a MVC'            
        );
        $this->view('pagina/index', $data);
    }

    public function articulos(){
        // echo 'Metodo articulos';
        $this->view('pagina/articulo');
    }

    public function actualizar($id){
        echo 'Metodo: actualizar<br>';
        echo 'Parametro: '.$id;
    }
}