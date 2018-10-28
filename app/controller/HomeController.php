<?php
class HomeController extends Controller{

    public function __construct(){
        // CARGAR MODELO
    }

    public function index(){
        $data = array(
            'title' => 'FRAMEWORK MVC'        
        );
        $this->view('home/index', $data);
    }
}