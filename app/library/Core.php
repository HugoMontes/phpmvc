<?php
// Mapear la url ingresada en el navegador
// 1-controlador
// 2-metodo
// 3-parametro
// Ejemplo: /articulo/actualizar/4
class Core{
    // Inicializar atributos por defecto
    protected $controller = 'pagescontroller';
    protected $method = 'index';
    protected $parameter = [];

    public function __construct(){
        // print_r($this->getUrl());
        $url = $this->getUrl();
        // Verificar si el archivo del controlador existe
        if(file_exists('../app/controller/'.ucwords($url[0]).'.php')){
            // Si existe se configura como controlador por defecto
            $this->controller = ucwords($url[0]);
            // Destruir la variable
            unset($url[0]); 
        }
        // Requerir el controlador
        require_once '../app/controller/'.$this->controller.'.php';
        // Instanciamos el nuevo controlador
        $this->controller = new $this->controller;
    }

    public function getUrl(){
        // echo $_GET['url'];
        // Verificar si esta seteada la url
        if(isset($_GET['url'])){
            // Elimina ultimo caracter / de la url
            $url = rtrim($_GET['url'], '/');
            // Verifica que es una cadena url
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Convertir url a un array
            $url = explode('/', $url);
            return $url;
        }
    }
}
