<?php
class PaginaController extends Controller{

    // DEFINIR ATRIBUTO PARA LE MODELO
    private $articuloModel;

    public function __construct(){
        // echo 'Controlador paginas cargado <br>';
        // CARGAR MODELO
        $this->articuloModel = $this->Model('Articulo');
    }

    public function index(){
        // echo 'Metodo index <br>';
        // OBTENER LOS ARTICULOS
        $articulos = $this->articuloModel->findAll();
        $data = array(
            'titulo' => 'Bienvenidos a MVC',
            'articulos' => $articulos            
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