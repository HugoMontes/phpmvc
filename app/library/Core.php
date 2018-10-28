<?php
// Mapear la url ingresada en el navegador
// 0-controlador
// 1-metodo
// 2-parametro
// Ejemplo: /articulo/actualizar/4
class Core{
    // Inicializar atributos por defecto
    protected $controller = 'homecontroller';
    protected $method = 'index';
    protected $parameter = [];

    public function __construct(){
        // print_r($this->getUrl());
        $url = $this->getUrl();
        // Obtener nombre archivo controlador
        $controllerFile = ucwords($url[0]).'Controller';
        // Verificar si el archivo del controlador existe
        if(file_exists('../app/controller/'.$controllerFile.'.php')){
            // Si existe se configura como controlador por defecto
            $this->controller = $controllerFile;
            // Destruir la variable
            unset($url[0]); 
        }
        // Requerir el controlador
        require_once '../app/controller/'.$this->controller.'.php';
        // Instanciamos el nuevo controlador
        $this->controller = new $this->controller;

        // Verificar la segunda parte de la url que seria el metodo
        // Verificar si se a seteado el metodo
        if(isset($url[1])) {
            if( method_exists($this->controller, $url[1])) {
                // Verificamos el metodo
                $this->method = $url[1];
                // Destruir la variable
                unset($url[1]);
            }
        }

        // Obtener parametros
        $this->parameter = $url?array_values($url):[];
        // Llamar callback con paramatros array
        call_user_func_array(array($this->controller, $this->method), $this->parameter);
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
