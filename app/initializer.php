<?php
// CARGAR ARCHIVO DE CONFIGURACION
require_once 'config/configuration.php';

// COMENTAR CARGADO MANUAL
// require_once 'library/Base.php';
// require_once 'library/Controller.php';
// require_once 'library/Core.php';

// MEJORAR EL CARGADO AUTOMATICO DE ARCHIVOS
spl_autoload_register(function($className){
    require_once 'library/'.$className.'.php';
});
